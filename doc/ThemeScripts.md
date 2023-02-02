# Theme Scripts

Navigate to `./tools` to run the following commands

## Changing the theme namespace

`node theme --namespace [MyNewNameSpace]`
Will read the theme root composer.json `autoload` `psr-4` namespace value then replace all namespaces in the theme .php files. It then updates the theme root composer.json namespace and finally runs `composer dump-autoload` to create new autoload files with updated namespace.

## Changing the theme text domain

`node theme --text-domain [some-new-text-domain]`
Will read the `text-domain` property value in the theme root package.json file and replace it with the specified value you provide to the above command. It will traverse all theme .php files and replace the text-domain with what you specify. It will also update root package.json `text-domain` property value.

## Changing the theme version

`node theme --theme-version #.#.#`
Will read the `version` property value in the theme root package.json file and replace it with the specified version from the command. It will also update style.css and functions.php and finally will run a new build.

Note that you can do all of the above manually. The scripts are just helpers.
