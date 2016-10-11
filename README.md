# A&D Starter Theme
Starter WordPress theme. Features [Bootstrap for Sass](https://github.com/twbs/bootstrap-sass), SCSS compiler, JS linting and minifying and class based functions.php

Requires a minimum of WordPress 4.5.

A&D Starter Theme is built with **Composer** and **Gulp** usage in mind and is the recommended way to use this theme.

## What tools do I need to use the theme?
1. [Node.js](https://github.com/ackmann-dickenson/ad-wp-starter-theme/wiki/Install-Node.js)
2. [Composer](https://getcomposer.org/doc/00-intro.md#globally)

## Instructions
1. `$ npm install -g bower gulp` : Install global packages _(needed to run bower and gulp in the command line)_
2. `$ npm install` : Install local packages
3. `$ bower install` :  Install bower packages

## Gulp Commands
`$ gulp build` : Compiles minified assets

`$ gulp dev` : Compiles uncompressed assets

`$ gulp watch` : Watches assets/scss and assets/js and compiles build assets

`$ gulp watch:dev` : Watches assets/scss and assets/js and compiles build:dev assets

`$ gulp lint` : Runs linters on files in assets/js

## Environmental Checks
The `wp-config.php` should define `WP_ENV` as `dev` for local development. Production checks should be flagged by this constant not being defined for fail safe reason. *ie* `<?php if ( !defined('WP_ENV') ): ?>`

## ACF Notes

For local development load `acf-export.json` and edit with ACF Field Groups admin page. In production environment the ACF fields should load from `/inc/acf/fields.php`. See [Environment Constants](https://github.com/ackmann-dickenson/ad-wp-starter-theme#environmental-checks) for details on environment checks.

**Please keep `acf-export.json` and `/inc/acf/fields.php` up to date with changes.**

## Resources
1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [BEM Introduction](http://getbem.com/introduction/)
3. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
4. [Modular JS Pattern](https://toddmotto.com/mastering-the-module-pattern/)

## Copyright and License
The following resources are included or used in part within the theme package.

* [Hybrid Core](http://themehybrid.com/) by Justin Tadlock - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
* [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.