import gulp from 'gulp';
import { rollup } from 'rollup';
import commonjs from '@rollup/plugin-commonjs';
import eslint from '@rollup/plugin-eslint';
import nodeResolve from '@rollup/plugin-node-resolve';
import alias from '@rollup/plugin-alias';
import { babel } from '@rollup/plugin-babel';
import { terser } from 'rollup-plugin-terser';

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
  const bundle = await rollup({
    input: `${PATHS.js.src}/theme.js`,
    plugins: [
      alias({ entries: ALIASES }),
      nodeResolve(),
      commonjs(),
      eslint(),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled',
      }),
      terser(),
    ]
  });

  return await bundle.write({
    file: `${PATHS.js.dest}/theme.min.js`,
    format: MODULE_FORMAT,
    name: 'main',
    sourcemap: true,
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
  const bundle = await rollup({
    input: `${PATHS.js.src}/theme.js`,
    plugins: [
      alias({ entries: ALIASES }),
      nodeResolve(),
      commonjs(),
      eslint(),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled',
      }),
    ]
  });

  return await bundle.write({
    file: `${PATHS.js.dest}/theme.js`,
    format: MODULE_FORMAT,
    name: 'main',
  });
}

const watchThemeScriptsDev = () => {
  const files = [
    `${PATHS.js.src}/theme.js`,
    `${PATHS.js.src}/**/*.js`,
  ];
  gulp.watch(files, processThemeScriptsDev);
}

export default {
  prod: processThemeScripts,
  dev: processThemeScriptsDev,
  watch: watchThemeScripts,
  watchDev: watchThemeScriptsDev
}
