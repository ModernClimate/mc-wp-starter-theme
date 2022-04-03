import gulp from 'gulp';
import { rollup } from 'rollup';
import commonjs from '@rollup/plugin-commonjs';
import eslint from '@rollup/plugin-eslint';
import { babel } from '@rollup/plugin-babel';
import { terser } from 'rollup-plugin-terser';

const MODULE_FORMAT = 'umd'
const PATHS = {
  js: {
    src: './assets/js',
    dest: './build/js'
  }
}

const processAdminScripts = async () => {
  const bundle = await rollup({
    input: `${PATHS.js.src}/admin.js`,
    plugins: [
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
    file: `${PATHS.js.dest}/admin.min.js`,
    format: MODULE_FORMAT,
    name: 'admin',
    sourcemap: true
  });
}

const watchAdminScripts = () => {
  const files = [
    `${PATHS.js.src}/admin.js`,
    `${PATHS.js.src}/admin/**/*.*`,
  ];
  gulp.watch(files, processAdminScripts);
}

export default {
  prod: processAdminScripts,
  watch: watchAdminScripts,
}
