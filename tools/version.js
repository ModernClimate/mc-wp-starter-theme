import { exec } from 'child_process';
import { replaceString, insertString, replaceJson } from './common.js';

const dateObj = new Date();
const dd = ('0' + dateObj.getDate()).slice(-2);
const mm = ('0' + (dateObj.getMonth() + 1)).slice(-2);
const yyyy = dateObj.getFullYear();

export const changeThemeVersion = async (newVersion) => {
  await replaceString({
    items: [[`Version:`, `Version: ${newVersion}`]],
    files: '../style.css',
  });

  await replaceString({
    items: [['THEME_VERSION', `define('THEME_VERSION', '${newVersion}');`]],
    files: '../functions.php',
  });

  await insertString({
    startLine: '## Versions',
    items: [
      `\r\n## [${newVersion}] - ${yyyy}-${mm}-${dd}\r\n### Changed\r\n\r\n-`,
    ],
    files: '../CHANGELOG.md',
  });

  await replaceJson({
    items: [['version', newVersion]],
    files: '../package.json',
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
