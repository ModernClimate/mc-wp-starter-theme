const rollup = require('rollup');
const combine = require('rollup-plugin-combine');
const commonjs = require('@rollup/plugin-commonjs');
const {terser} = require('rollup-plugin-terser');

const processVendorScripts = async () => {
  const bundle = await rollup.rollup({
    external: ['@popperjs/core'],
    input: [
      // './node_modules/@popperjs/core/dist/umd/popper.min.js',
      './node_modules/bootstrap/dist/js/bootstrap.js',
    ],
    plugins: [
      commonjs(),
      combine(),
      terser()
    ]
  });

  return await bundle.write({
    file: './build/js/vendor.min.js',
    format: 'commonjs',
    name: 'vendor',
    sourcemap: false
  });
}

module.exports =  {
  process: processVendorScripts,
}
