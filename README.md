# A&D Starter Theme
Starter WordPress theme. Features SCSS based Bootstrap, SCSS compilers and minifiers, JS minifiers and class based funnctions.php

## Requirements
1. [Node.js](https://github.com/ackmann-dickenson/ad-wp-starter-theme/wiki/Install-Node.js)

## Instructions
1. `$ npm install -g bower gulp` : Install global packages _(needed to run bower and gulp in the command line)_
2. `$ npm install` : Install local packages
3. `$ bower install` :  Install bower packages

## Commands
`$ gulp build` : Compiles css and js in assets/dist directory. Also copies fonts to assets/fonts directory.

`$ gulp watch` : Watches assets/scss and assets/js directories for changes to recompile.

`$ gulp lint` : Runs linters on files in assets/js
