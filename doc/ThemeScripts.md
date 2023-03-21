# Theme Scripts

Navigate to `./tools` to run the following commands

## Changing the theme version

`node theme --theme-version #.#.#`
Will read the `version` property value in the theme root package.json file and replace it with the specified version from the command. It will also update style.css and functions.php and finally will run a new build.

Note that you can do all of the above manually. The scripts are just helpers.
