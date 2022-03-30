# Modern Climate Starter Theme
Starter WordPress theme. Features [Bootstrap for Sass](https://github.com/twbs/bootstrap-sass), SCSS compiler, JS linting and minifying and class based functions.php

Requires a minimum of WordPress 5.3, PHP 7.4, and Composer 2

MC Starter Theme is built with **Composer** and **Gulp** usage in mind and is the recommended way to use this theme.

## What tools do I need to use the theme?
1. [Node.js](https://github.com/ModernClimate/mc-wp-starter-theme/wiki/Install-Node.js)
2. [NVM](https://github.com/nvm-sh/nvm)
3. [Yarn](https://yarnpkg.com/en/docs/install)
4. [Composer](https://getcomposer.org/doc/00-intro.md#globally)
5. [PHP](https://www.php.net/supported-versions.php)

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

`$ gulp phpcbf` : Runs PHP Code Beautifier on all *.php files within the theme directory.

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
7. [Wordplate Extended ACF](https://github.com/wordplate/extended-acf)
7. [UIkit](https://getuikit.com/)

## ACF Documentation
- Wordplate Extended ACF is included as the means to build fields, field groups, reusable fields
- Custom `ACF Utility Functions` are included in the theme to retrieve ACF data in a more effecient way: (https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/acf/README.md)

## Extensions
Check out the [Code Snippets Repo](https://github.com/ModernClimate/ad-code-snippets) for additional functionality.

## Documentation
* [ACF Utility Functions](https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/acf/README.md)

## Copyright and License
The following resources are included or used in part within the theme package.

* [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.
