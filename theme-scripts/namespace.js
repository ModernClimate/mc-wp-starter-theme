import { readFile, writeFile } from 'fs';
import { exec } from 'child_process';
import glob from 'glob';

import settings from './.themerc.json' assert { type: 'json' };
import { writeFileCb } from './common';

if (process.length <= 2) {
  console.log('Missing required namespace');
  process.exitCode = 1;
}

const newNamespace = process.argv[2];

// Replace occurrences
glob('../**/*.php', { ignore: '{../build,../node_modules,../vendor}/**' }, function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetStringPackage = new RegExp(`@package ${settings.THEME_NAMESPACE}`, 'g');
      const targetStringNS = new RegExp(`namespace ${settings.THEME_NAMESPACE}`, 'g');
      const targetStringUse = new RegExp(`use ${settings.THEME_NAMESPACE}`, 'g');
      const replaced = contents.replace(targetStringPackage, `@package ${newNamespace}`).replace(targetStringNS, `namespace ${newNamespace}`).replace(targetStringUse, `use ${newNamespace}`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});

// Update theme config
glob('./.themerc.json', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = new RegExp(`"THEME_NAMESPACE": "${settings.THEME_NAMESPACE}"`, 'g');
      const replaced = contents.replace(targetLine, `"THEME_NAMESPACE": "${newNamespace}"`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});

// Update composer.json namespace
glob('../composer.json', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = `${settings.THEME_NAMESPACE}\\\\`;
      const replaced = contents.replace(targetLine, `${newNamespace}\\\\`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
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
  console.log(`stdout: ${stdout}`);
});
