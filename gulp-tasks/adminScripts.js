const gulp = require('gulp');
const rollup = require('rollup');
const commonjs = require('@rollup/plugin-commonjs');
const eslint = require('@rollup/plugin-eslint');
const {babel} = require('@rollup/plugin-babel');
const {terser} = require('rollup-plugin-terser');

const processAdminScripts = async () => {
  const bundle = await rollup.rollup({
    external: ['jquery', 'popper.js'],
    input: './assets/js/admin.js',
    plugins: [
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
    file: './build/js/admin.min.js',
    format: 'umd',
    name: 'admin',
    sourcemap: true
  });
}

const watchAdminScripts = () => {
  const files = [
    'assets/js/admin.js',
    'assets/js/admin/**/*.*',
  ];
  gulp.watch(files, processAdminScripts);
}

module.exports =  {
  process: processAdminScripts,
  watch: watchAdminScripts,
}
