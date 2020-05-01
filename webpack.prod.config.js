// webpack.dev.config.js

module.exports = {
  output: {
    filename: 'theme.js',
  },
  mode: 'production',
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /(node_modules)/,
        loader: 'babel-loader',
        options: {
          presets: ['@babel/preset-env']
        },
      },
    ],
  },
};