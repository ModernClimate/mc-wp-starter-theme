import { Command } from 'commander';

import { changeThemeVersion } from './version.js';

const program = new Command();

program
  .version('0.0.1')
  .option('-tv, --theme-version [themeVersion]', 'new theme version')
  .parse(process.argv);

const options = program.opts();

console.log(options);

if (options.themeVersion) {
  console.log('Updating theme version to: ', options.themeVersion);
  changeThemeVersion(options.themeVersion);
}
