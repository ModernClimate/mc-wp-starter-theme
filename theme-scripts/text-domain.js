import { readFile, writeFile } from 'fs';
import glob from 'glob';

import settings from './.themerc.json' assert { type: 'json' };
import { writeFileCb } from './common.js';

if (process.length <= 2) {
  console.log('Missing required namespace');
  process.exitCode = 1;
}

const newThemeTextDomain = process.argv[2];

// Replace occurrences
glob('../**/*.php', { ignore: '{../build,../node_modules,../vendor}/**' }, function (err, files) {
  files.forEach((file) => {
    readFile(file, 'utf-8', function (err, contents) {
      if (err) {
        console.log(err);
        return;
      }

      const targetLine = new RegExp(`"${settings.THEME_TEXT_DOMAIN}"`, 'g');
      const targetLineSingle = new RegExp(`'${settings.THEME_TEXT_DOMAIN}'`, 'g');
      const replaced = contents.replace(targetLine, `"${newThemeTextDomain}"`).replace(targetLineSingle, `'${newThemeTextDomain}'`);

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

      const targetLine = new RegExp(`"THEME_TEXT_DOMAIN": "${settings.THEME_TEXT_DOMAIN}"`, 'g');
      const replaced = contents.replace(targetLine, `"THEME_TEXT_DOMAIN": "${newThemeTextDomain}"`);

      writeFile(file, replaced, 'utf-8', (err) => {
        writeFileCb(file, err);
      });

      return;
    });
  });
});
