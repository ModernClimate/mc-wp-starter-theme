import { exec } from 'child_process';

import packageJson from '../package.json' assert { type: 'json' };
import { replaceString, replaceJson } from './common.js';

const { version } = packageJson;

export const changeThemeVersion = async (newVersion) => {
  await replaceJson({
    items: [['version', newVersion]],
    files: '../package.json',
  });

  await replaceString({
    items: [[`Version: ${version}`, `Version: ${newVersion}`]],
    files: '../style.css',
  });

  await replaceString({
    items: [
      [
        `define('THEME_VERSION', '${version}');`,
        `define('THEME_VERSION', '${newVersion}');`,
      ],
    ],
    files: '../functions.php',
  });

  // Rebuild composer autoload namespace
  console.log('Building new assets...');
  exec('yarn run build', { cwd: '..' }, (error, stdout, stderr) => {
    if (error) {
      console.log(`error: ${error.message}`);
      return;
    }
    if (stderr) {
      console.log(`stderr: ${stderr}`);
      return;
    }
    console.log(`${stdout}`);
  });
};
