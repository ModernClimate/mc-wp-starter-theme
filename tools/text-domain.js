import path from 'path';
import { replaceString, replaceJson } from './common.js';
import composerJson from '../composer.json' assert { type: 'json' };

const { 'text-domain': textDomain } = composerJson;
const themeSlug = path.basename('../');

// TODO make text-domain the name of the theme folder name

export const changeTextDomain = async (newTextDomain) => {
  console.log('test');
  console.log('themeSlug', themeSlug);
  // await replaceJson({
  //   items: [['text-domain', newTextDomain]],
  //   files: '../package.json',
  // });

  // await replaceString({
  //   items: [
  //     [new RegExp(`@package ${textDomain}`, 'g'), `@package ${newNamespace}`],
  //     [new RegExp(`namespace ${textDomain}`, 'g'), `namespace ${newNamespace}`],
  //     [new RegExp(`use ${textDomain}`, 'g'), `use ${newNamespace}`],
  //   ],
  //   files: '../**/*.php',
  //   options: { ignore: '{../build,../node_modules,../vendor}/**' },
  // });
};

// need to find __(), _e()
// __(
//   'some',
//   'domain'
// );
// __(
//   'some',
//   'domain'
// );
// _e(
//   "some",
//   "domain"
// );
// _e(
//   "some",
//   "domain"
// );
