'use strict'; // eslint-disable-line

const { default: ImageminPlugin } = require('imagemin-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const HtmlCriticalWebpackPlugin = require("html-critical-webpack-plugin");

const config = require('./config');

const assetsFilenames = (config.enabled.cacheBusting) ? config.cacheBusting : '[name]';

console.log('********');
console.log('********');
console.log('assetFilenames', assetsFilenames);
console.log('********');
console.log('********');
console.log('config', config);
console.log('********');
console.log('********');

module.exports = {
  plugins: [
    new ImageminPlugin({
      optipng: { optimizationLevel: 2 },
      gifsicle: { optimizationLevel: 3 },
      pngquant: { quality: '65-90', speed: 4 },
      svgo: {
        plugins: [
          { removeUnknownsAndDefaults: false },
          { cleanupIDs: false },
          { removeViewBox: false },
        ],
      },
      plugins: [imageminMozjpeg({ quality: 75 })],
      disable: (config.enabled.watcher),
    }),
    new UglifyJsPlugin({
      uglifyOptions: {
        ecma: 5,
        compress: {
          warnings: true,
          drop_console: true,
        },
      },
    }),
    /*
    // 2020-03-13 temporarly removing critical css as it is causing a yarn build:production error.
    new HtmlCriticalWebpackPlugin({
      base: config.paths.dist,
      //src: config.devUrl + '?no-async=true',
      src: config.devUrl,
      dest: "styles/critical-home.css",
      ignore: ["@font-face", /url\(/],
      inline: false,
      minify: true,
      extract: false,
      dimensions: [
        {
          width: 360,
          height: 640,
        },
        {
          width: 375,
          height: 667,
        },
        {
          width: 1366,
          height: 768,
        },
        {
          width: 1440,
          height: 900,
        },
        {
          width: 1920,
          height: 1080,
        },
      ],
      penthouse: {
        blockJSRequests: false,
      },
    }),
    */
  ],
};
