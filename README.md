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

## Gulp Commands
`$ gulp build` : Compiles minified assets

`$ gulp dev` : Compiles uncompressed assets

`$ gulp watch` : Watches assets/scss and assets/js and compiles build assets

`$ gulp watch:dev` : Watches assets/scss and assets/js and compiles build:dev assets

`$ gulp lint` : Runs linters on files in assets/js

`$ gulp sass-lint` : Runs linters on files in assets/scss

## Composer notes
If you decide to update the `psr-4` namespace prefix, you can use dump-autoload to do that without having to go through an install or update.
```
composer dump-autoload
```

## Environmental Checks
The `wp-config.php` should define `WP_ENV` as `dev` for local development. Production checks should be flagged by this constant not being defined for fail safe reason. *ie* `<?php if ( !defined('WP_ENV') ): ?>`

## ACF Notes
A `.env` file must be added to the root of the A&D Starter Theme directory with the following code `ACF_PRO_KEY=Your-Key-Here` to install ACF Pro. The `.env` file type has been added to the .gitignore and should never be committed to the repo.

ACF Pro is installed via Composer to the plugins directory. Activate the plugin at `/wp-admin/plugins.php`. Once activated a site Options page and boilerplate page builder modules will be generated from `/inc/acf/fields.php`.

To utilize the ACF ui for local development comment out the `/inc/acf/fields.php` reference within `App/ACF.php` and import `acf-export.json` through the ACF ui. In production environments ACF fields should load from `/inc/acf/fields.php`. The PHP definitions can be generated via the ACF ui.  

See [Environment Constants](https://github.com/ackmann-dickenson/ad-wp-starter-theme#environmental-checks) for details on environment checks.

**Please keep `acf-export.json` and `/inc/acf/fields.php` up to date with changes.**

## Resources
1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [PSR-2 PHP Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
3. [BEM Introduction](http://getbem.com/introduction/)
4. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
5. [Sass Lint](https://github.com/sasstools/sass-lint)
6. [Modular JS Pattern](https://toddmotto.com/mastering-the-module-pattern/)

## Copyright and License
The following resources are included or used in part within the theme package.

* [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.
