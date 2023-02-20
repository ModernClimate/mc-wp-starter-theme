# Modern Climate Starter Theme

Starter WordPress theme. Features [UIKit](https://getuikit.com/docs/introduction), SCSS compiler, TS/JS linting and minifying, and class-based functions.php

Requires a minimum of WordPress 6.0, PHP 8.0, and Composer 2

MC Starter Theme is built with **Composer** and **Vite** usage in mind and is the recommended way to use this theme.

## What tools do I need to use the theme?

1. [Node.js](https://github.com/ModernClimate/mc-wp-starter-theme/wiki/Install-Node.js)
2. [NVM](https://github.com/nvm-sh/nvm)
3. [Yarn](https://yarnpkg.com/en/docs/install)
4. [Composer](https://getcomposer.org/doc/00-intro.md#globally)
5. [PHP](https://www.php.net/supported-versions.php)

## Instructions

1. `$ nvm i` : Installs and switches to necessary node defined in `.nvmrc`
2. `$ yarn install` : Install yarn packages _(postinstall will run composer install and vite build)_

## Vite Commands

All minified assets are created to the `/build/` directory of the theme.

`$ yarn run build` : Builds assets folder, then compiles minified assets

`$ yarn run watch` : Watches assets folder for changes, then compiles minified assets

## Composer notes

If you decide to update the `psr-4` namespace prefix, you can use dump-autoload to do that without having to go through an install or update.

```
composer dump-autoload
```

## Resources

1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [PSR-2 PHP Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
3. [Wordplate Extended ACF](https://github.com/wordplate/extended-acf)
4. [Vite](https://vitejs.dev/)
5. [Prettier](https://prettier.io/)
6. [UIkit](https://getuikit.com/)
7. [BEM Introduction](http://getbem.com/introduction/)
8. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
9. [Sass Lint](https://github.com/sasstools/sass-lint)
10. [TypeScript](https://www.typescriptlang.org/)

## ACF Documentation

- Wordplate Extended ACF is included as the means to build fields, field groups, reusable fields
- Custom `ACF Utility Functions` are included in the theme to retrieve ACF data in a more effecient way: (https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/acf/README.md)

## Extensions

Check out the [Code Snippets Repo](https://github.com/ModernClimate/ad-code-snippets) for additional functionality.

## Documentation

- [ACF Utility Functions](https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/acf/UtilityFunctions.md)
- [ACF Field Registration](https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/acf/FieldRegistration.md)
- [Setting up autoformat on save in your code editor](https://github.com/ModernClimate/mc-wp-starter-theme/blob/master/doc/Autoformatting.md)

## Copyright and License

The following resources are included or used in part within the theme package.

- [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.
