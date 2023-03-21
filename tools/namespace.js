import { exec } from 'child_process';

import { replaceString, replaceJson } from './common.js';
import composerJson from '../composer.json' assert { type: 'json' };

const { namespace } = composerJson;

export const changeNamespace = async (newNamespace) => {
  await replaceJson({
    items: [
      ['autoload', { autoload: { ['psr-4']: { [`${newNamespace}\\`]: '' } } }],
    ],
    files: '../composer.json',
  });

  await replaceString({
    items: [
      [new RegExp(`@package ${namespace}`, 'g'), `@package ${newNamespace}`],
      [new RegExp(`namespace ${namespace}`, 'g'), `namespace ${newNamespace}`],
      [new RegExp(`use ${namespace}`, 'g'), `use ${newNamespace}`],
    ],
    files: '../**/*.php',
    options: { ignore: '{../build,../node_modules,../vendor}/**' },
  });

  // Rebuild composer autoload namespaces
  exec('composer dump-autoload', { cwd: '..' }, (error, stdout, stderr) => {
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
