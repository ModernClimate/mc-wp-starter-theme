# Theme Scripts

1. cd into `./tools`
2. Run `yarn install` if you haven't in that folder yet
3. See below for any script commands

## Changing the theme version

`node theme --theme-version #.#.#`
Will read the `version` property value in the theme root package.json file and replace it with the specified version from the command. It will also update style.css and functions.php and finally will run a new build.

Note that you can do all of the above manually. The scripts are just helpers.
