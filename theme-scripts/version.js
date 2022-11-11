import { readFile, writeFile } from 'fs';
import glob from 'glob';

import settings from './.themerc.json' assert { type: 'json' };
import { writeFileCb } from './common';

if (process.length <= 2) {
  console.log('Missing version argument');
  process.exitCode = 1;
}

const newThemeVersion = process.argv[2];

// Update theme config
glob('./.themerc.json', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = new RegExp(`"THEME_VERSION": "${settings.THEME_VERSION}"`, 'g');
      const replaced = contents.replace(targetLine, `"THEME_VERSION": "${newThemeVersion}"`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});

// Update package.json theme version
// "version": "3.1.0",
glob('../package.json', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = `"version": "${settings.THEME_VERSION}"`;
      const replaced = contents.replace(targetLine, `"version": "${newThemeVersion}"`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});

// Update style.css theme version
// Version: 3.1.0
glob('../style.css', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = `Version: ${settings.THEME_VERSION}`;
      const replaced = contents.replace(targetLine, `Version: ${newThemeVersion}`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});

// Update functions.php theme version
// define('THEME_VERSION', '3.1.0');
glob('../functions.php', function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = `define('THEME_VERSION', '${settings.THEME_VERSION}');`;
      const replaced = contents.replace(targetLine, `define('THEME_VERSION', '${newThemeVersion}');`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});
