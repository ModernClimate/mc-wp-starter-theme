const gulp = require('gulp');
const rollup = require('rollup');
const commonjs = require('@rollup/plugin-commonjs');
const eslint = require('@rollup/plugin-eslint');
const {babel} = require('@rollup/plugin-babel');
const nodeResolve = require('@rollup/plugin-node-resolve');
const {terser} = require('rollup-plugin-terser');
const alias = require('@rollup/plugin-alias');


const MODULE_FORMAT = 'umd'
const ALIASES = [
  {find: 'uikit-util', replacement: 'uikit/src/js/util'}
]
const PATHS = {
  js: {
    src: './assets/js',
    dest: './build/js'
  }
}

const processThemeScripts = async () => {
  const bundle = await rollup.rollup({
    input: `${PATHS.js.src}/theme.js`,
    plugins: [
      alias({
        entries: ALIASES
      }),
      nodeResolve(),
      commonjs(),
      eslint(),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled'
      }),
      terser()
    ]
  });

  return await bundle.write({
    file: `${PATHS.js.dest}/theme.min.js`,
    format: MODULE_FORMAT,
    name: 'main',
    sourcemap: true
  });
}

const watchThemeScripts = () => {
  const files = [
    `${PATHS.js.src}/theme.js`,
    `${PATHS.js.src}/**/*.js`,
  ];
  gulp.watch(files, processThemeScripts);
}

const processThemeScriptsDev = async () => {
  const bundle = await rollup.rollup({
    input: `${PATHS.js.src}/theme.js`,
    plugins: [
      alias({
        entries: ALIASES
      }),
      nodeResolve(),
      commonjs(),
      eslint(),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled'
      })
    ]
  });

  return await bundle.write({
    file: `${PATHS.js.dest}/theme.js`,
    format: MODULE_FORMAT,
    name: 'main',
    sourcemap: false
  });
}

const watchThemeScriptsDev = () => {
  const files = [
    `${PATHS.js.src}/theme.js`,
    `${PATHS.js.src}/**/*.js`,
  ];
  gulp.watch(files, processThemeScriptsDev);
}

module.exports =  {
  prod: processThemeScripts,
  dev: processThemeScriptsDev,
  watch: watchThemeScripts,
  watchDev: watchThemeScriptsDev
}
