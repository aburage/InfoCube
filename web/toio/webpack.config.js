const path = require('path');
const webpack = require('webpack');
module.exports = {
  target: 'web',
  mode: 'production',
  entry: './src/main.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'main.js'
  },
  resolve: {
    alias: {
      'noble-mac': 'noble'
    }
  },
  plugins: [
    new webpack.IgnorePlugin(/^ws$/)
  ],
  devtool: 'source-map'
};