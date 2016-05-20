# A&D Starter Theme
Starter WordPress theme. Features [Bootstrap for Sass](https://github.com/twbs/bootstrap-sass), SCSS compiler, JS linting and minifying and class based functions.php

## Requirements
1. [Node.js](https://github.com/ackmann-dickenson/ad-wp-starter-theme/wiki/Install-Node.js)

## Instructions
1. `$ npm install -g bower gulp` : Install global packages _(needed to run bower and gulp in the command line)_
2. `$ npm install` : Install local packages
3. `$ bower install` :  Install bower packages

## Gulp Commands
`$ gulp build` : Compiles minified assets

`$ gulp build:dev` : Compiles uncompressed assets

`$ gulp watch` : Watches assets/scss and assets/js

`$ gulp lint` : Runs linters on files in assets/js

## Environmental Checks
The `wp-config.php` should define `WP_ENV` as `dev` for local development. Production checks should be flagged by this constant not being defined for fail safe reason. *ie* `<?php if ( !defined('WP_ENV') ): ?>`

## ACF Notes

For local development load `acf-export.json` and edit with ACF Field Groups admin page. In production environment the ACF fields should load from `/inc/acf-fields.php`. See [Environment Constants](#environmental-constants) for details on environment checks.

**Please keep `acf-export.json` and `/inc/acf-fields.php` up to date with changes.**