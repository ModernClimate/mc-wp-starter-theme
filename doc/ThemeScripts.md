# Theme Scripts

Navigate to `./theme-scripts` to run the following commands

## Changing the theme namespace

`node namespace.js [MyNewNameSpace]`
Will read the .themerc.json THEME_NAMESPACE value with the new namespace argument you provide then does a find/replace in all theme .php files.

## Changing the theme text domain

`node text-domain.js [some-new-text-domain]`
Will read the .themerc.json THEME_TEXT_DOMAIN value and replace it with the argument you provide to the above command. It will traverse all theme .php files and replace the text-domain with what you specify.

## Changing the theme version

`node version.js #.#.#`
Will read the .themerc.json THEME_VERSION value and replace it with the specified version from the command in various files (packages.json, style.css, functions.php)

Note that you can do all of the above manually. The scripts are just helpers.
