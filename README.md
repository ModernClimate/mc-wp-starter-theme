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
1. `$ nvm i` : Installs and switches to necessary node defined in `.nvmrc`
2. `$ yarn install` :  Install yarn packages _(postinstall will run composer install and gulp build)_

## Gulp Commands
All minified assets are created to the `/build/` directory of the theme.
ex: `yarn gulp styles` to run commands exported from gulpfile.js

`$ gulp` : Runs linters and PHPCS, then compiles both minified and non-minified assets

`$ gulp watch` : Watches assets/scss, assets/js, then compiles non-minified build assets

`$ gulp watchDev` : Watches assets/scss, assets/js, then compiles minified build assets

`$ gulp build` : Runs linters and PHPCS, then compiles minified assets

`$ gulp buildDev` : Runs linters and PHPCS, then compiles non-minified assets

`$ gulp js` : Compiles theme.min.js file from assets/js/theme directory.

`$ gulp jsDev` : Compiles theme.js file from assets/js/theme directory.

`$ gulp styles` : Compiles minified (_.min.css) files based on root scss files in assets/scss directory.

`$ gulp stylesDev` : Compiles non-minified files based on root scss files in assets/scss directory.

`$ gulp phpcs` : Runs PHP Code Sniffer on all *.php files within the theme directory.

`$ gulp phpcbf` : Runs PHP Code Beautifier on all *.php files within the theme directory.

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
