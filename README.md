# A&D Starter Theme
Starter WordPress theme. Features [Bootstrap for Sass](https://github.com/twbs/bootstrap-sass), SCSS compiler, JS linting and minifying and class based functions.php

Requires a minimum of WordPress 4.5.

A&D Starter Theme is built with **Composer** and **Gulp** usage in mind and is the recommended way to use this theme.

## What tools do I need to use the theme?
1. [Node.js](https://github.com/ackmann-dickenson/ad-wp-starter-theme/wiki/Install-Node.js)
1. [Yarn](https://yarnpkg.com/en/docs/install)
2. [Composer](https://getcomposer.org/doc/00-intro.md#globally)

## Instructions
1. `$ yarn install` :  Install yarn packages _(postinstall will run composer install and gulp build)_
exports.vendor      = buildScriptsVendor;
exports.theme       = buildScriptsTheme;
exports.styles      = buildStyles;
exports.scriptsLint = scriptsLint;
exports.sassLint    = stylesLint;
exports.phpcs       = phpCodeSniffer;
exports.js          = js;
exports.build       = build;
exports.watch       = watch;
## Gulp Commands
All minified assets are created to the `/build/` directory of the theme.

`$ gulp build` : Runs linters and PHPCS, then compiles minified assets

`$ gulp watch` : Watches assets/scss, assets/js, and php files for linters and phpcs, then compiles build assets

`$ gulp watchDev` : Similar to `watch`, does not minify /js/theme files.

`$ gulp scriptsLint` : Runs linters on files in assets/js 

`$ gulp sassLint` : Runs linters on files in assets/scss

`$ gulp phpcs` : Runs PHP Code Sniffer on all *.php files within the theme directory.

`$ gulp theme` : Compiles theme.min.js file from assets/js/theme directory.

`$ gulp themeDev` : Compiles theme.min.js file from assets/js/theme directory, uncompressed.

`$ gulp vendor` : Compiles vendors.min.js file from assets/js/vendors directory.

`$ gulp styles` : Compiles theme.min.css file from assets/scss directory.

## Composer notes
If you decide to update the `psr-4` namespace prefix, you can use dump-autoload to do that without having to go through an install or update.
```
composer dump-autoload
```

## Resources
1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [PSR-2 PHP Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
3. [BEM Introduction](http://getbem.com/introduction/)
4. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
5. [Sass Lint](https://github.com/sasstools/sass-lint)
6. [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
7. [Modular JS Pattern](https://toddmotto.com/mastering-the-module-pattern/)

## Copyright and License
The following resources are included or used in part within the theme package.

* [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.
