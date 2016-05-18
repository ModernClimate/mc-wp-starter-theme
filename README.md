# A&D Starter Theme
Starter WordPress theme. Features [Bootstrap for Sass](https://github.com/twbs/bootstrap-sass), SCSS compiler, JS linting and minifying and class based functions.php

## Requirements
1. [Node.js](https://github.com/ackmann-dickenson/ad-wp-starter-theme/wiki/Install-Node.js)

## Instructions
1. `$ npm install -g bower gulp` : Install global packages _(needed to run bower and gulp in the command line)_
2. `$ npm install` : Install local packages
3. `$ bower install` :  Install bower packages

## Commands
`$ gulp build` : Compiles minified assets

`$ gulp build:dev` : Compiles uncompressed assets

`$ gulp watch` : Watches assets/scss and assets/js

`$ gulp lint` : Runs linters on files in assets/js
