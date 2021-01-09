/**
 * Laravel mix - Fancy Research Links
 *
 * Output:
 * 		- dist
 *        - resources
 *          - lang (.mo files)
 *          - views
 *        FancyResearchLinksModule.php
 *        module.php
 *        LICENSE.md
 *        README.md
 *
 */

/**
 * Laravel mix entry point
 *
 * Load the appropriate section
 */

if (process.env.section) {
  require(`${__dirname}/webpack.mix.${process.env.section}.js`);
}

// Disable mix-manifest.json (https://github.com/JeffreyWay/laravel-mix/issues/580)
// Prevent the distribution zip file containing an unwanted file
Mix.manifest.refresh = _ => void 0

let mix = require('laravel-mix');
require('laravel-mix-clean');

const dist_dir = 'dist/jc-fancy-research-links';

//https://github.com/gregnb/filemanager-webpack-plugin
const FileManagerPlugin = require('filemanager-webpack-plugin');

mix
  .setPublicPath('./dist')
  .copyDirectory('resources/views', dist_dir + '/resources/views')
  .copy('resources/lang/*.mo', dist_dir + '/resources/lang')
  .copy('FancyResearchLinksModule.php', dist_dir)
  .copy('module.php', dist_dir)
  .copy('LICENSE.md', dist_dir)
  .copy('README.md', dist_dir)
  .webpackConfig({
    plugins: [
      new FileManagerPlugin({
        onEnd: {
          archive: [{
            source: './dist',
            destination: 'dist/fancy-researchlinks-2.0.10.zip'
          }]
        }
      })
    ]
  })
  .clean();
