const gulp = require('gulp');
const rollup = require('rollup');
const commonjs = require('@rollup/plugin-commonjs');
const eslint = require('@rollup/plugin-eslint');
const {babel} = require('@rollup/plugin-babel');
const nodeResolve = require('@rollup/plugin-node-resolve');
const {terser} = require('rollup-plugin-terser');
const alias = require('@rollup/plugin-alias');

const processThemeScripts = async () => {
  const bundle = await rollup.rollup({
    input: './assets/js/theme.js',
    plugins: [
      alias({
        entries: [
          {find: 'uikit-util', replacement: 'uikit/src/js/util'},
        ]
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
    file: './build/js/theme.min.js',
    format: 'umd',
    name: 'main',
    sourcemap: true
  });
}

const watchThemeScripts = () => {
  const files = [
    'assets/js/theme.js',
    'assets/js/theme/**/*.js',
  ];
  gulp.watch(files, processThemeScripts);
}

module.exports =  {
  process: processThemeScripts,
  watch: watchThemeScripts,
}
