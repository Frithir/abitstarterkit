const path = require('path'),
  MiniCssExtractPlugin = require('mini-css-extract-plugin'),
  UglifyJSPlugin = require('uglifyjs-webpack-plugin'),
  OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin'),
  BrowserSyncPlugin = require('browser-sync-webpack-plugin'),
  StyleLintPlugin = require('stylelint-webpack-plugin');

const proxy = 'http://abitstarterkit.localhost';

module.exports = {
  context: __dirname,
  entry: {
    frontend: ['./src/js/app.js', './src/scss/app.scss']
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'app.min.js'
  },
  stats: {
    colors: true,
    modules: false,
    reasons: false,
    errorDetails: false
  },
  mode: 'development',
  devtool: 'source-map',
  module: {
    rules: [
      {
        enforce: 'pre',
        exclude: /node_modules/,
        test: /\.jsx$/,
        loader: 'eslint-loader'
      },
      {
        test: /\.jsx?$/,
        loader: 'babel-loader'
      },
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
      },
      {
        test: /\.(jpe?g|png|gif|woff|woff2|eot|ttf|svg)(\?[a-z0-9=.]+)?$/,
        loader: 'url-loader?limit=100000'
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({ filename: 'app.min.css' }),
    new BrowserSyncPlugin({
      files: '**/*.php',
      injectChanges: true,
      proxy,
      open: false
    })
  ],
  optimization: {
    minimizer: [new UglifyJSPlugin(), new OptimizeCssAssetsPlugin()]
  }
};
