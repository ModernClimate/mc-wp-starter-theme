import { Command } from 'commander';

import { changeNamespace } from './namespace.js';
import { changeTextDomain } from './text-domain.js';
import { changeThemeVersion } from './version.js';

const program = new Command();

program
  .version('0.0.1')
  .option('-ns, --namespace [themeNamespace]', 'new theme PSR namespace')
  .option('-td, --text-domain [themeTextDomain]', 'new theme text domain')
  .option('-tv, --theme-version [themeVersion]', 'new theme version')
  .parse(process.argv);

const options = program.opts();

console.log(options);

if (options.namespace) {
  console.log('Updating theme namespace to: ', options.namespace);
  changeNamespace(options.namespace);
}

if (options.textDomain) {
  console.log('Updating theme text-domain to: ', options.textDomain);
  changeTextDomain(options.textDomain);
}

if (options.themeVersion) {
  console.log('Updating theme version to: ', options.themeVersion);
  changeThemeVersion(options.themeVersion);
}
