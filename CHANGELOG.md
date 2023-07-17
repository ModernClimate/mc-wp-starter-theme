# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## Versions

## [3.1.8] - 2023-07-17

### Changed

- Added an ACF class method called getTermMeta that gets and caches term meta similarly to how getPostMeta works.

## [3.1.7] - 2023-05-17

### Changed

- Added a constants.php file to hold all theme constants
- Added new Media method for getting image attachment src `Media::getAttachmentSrc($attachment, 'full')`
- Added new Media method for getting image attachment src by id `Media::getAttachmentSrcById($attachment_id, 'full')`

## [3.1.6] - 2023-04-26

### Changed

- Added a style hook to each module and added the hook action to the Module class
- Change starter modules in section rather than div
- Switch @globals in included starter modules to @var and add types then add missing $row_id variable
- uikit: add visibility scss include. Add uikit js parallax imports to slider/slideshow
- Add id="primary" to all templates needing it

## [3.1.5] - 2023-04-24

### Changed

- Upgrade Vite to 4.3
- Upgrade node to v18
- Upgrade uikit to 3.16

## [3.1.4] - 2023-03-21

### Changed

- Add tool to update theme version. See the doc/ThemeScripts.md file on how to use

## [3.1.3] - 2023-03-21

### Changed

- Media class getAttachmentByID method returns null if no attachment was found.

## [3.1.2] - 2023-02-20

### Changed

- Switch theme .ts files to .js to make .ts optional from the start
- Add .github PR description template
- Update UIKit slider module with a real example
- Remove redundant slider init
- Import UIKit in root theme scripts correctly

## [3.1.1] - 2023-02-03

### Changed

- Updated Wordplate to Vinkla 11.2
- Renamed some script/style files to be more explicit
- Formatted all PHP files based on Intelephense formatting

## [3.1.0] - 2022-11-11

### Changed

- Switched from [Gulp](https://gulpjs.com/) to [Vite](https://vitejs.dev/) for theme task runner (more succinct and much faster)
- Use prettier to format php files on pre-commit
- Add autoformat file configs for css, scss, js, ts, php, etc
- Added some theme scripts to help replace namespaces, text-domains and uptick theme version

## [3.0.2] - 2022-10-26

### Changed

- Switch RegisterFieldGroups init hook to `acf/init` from `admin_init`

## [3.0.1] - 2022-10-24

### Changed

- Switch style/script enqueue to use get_template_directory_uri instead of get_stylesheet_directory_uri as requirement to support child theming.

## [3.0.0] - 2022-03-29

### Changed

- Switched build process to use Rollup.js to support ES modules rather than modular pattern
- Remove Bootstrap
- Add UIKit for front end components
- Build processes are now moved to a separate folder
- Updated dependencies
- Support Composer 2
- Require PHP >= 7.4

## [2.4.0] - 2019-03-29

### Changed

- Updated Gulp to v4

### Added

- Added PHP CodeSniffer to gulp tasks and builds.

## [2.3.2] - 2018-10-26

### Changed

- Updated Bootstrap to 4.1.3.

## [2.3.2] - 2018-10-25

### Added

- Post Types and Taxonomies classes for consistent object registration.

### Removed

- Environment file. Will be handled in root directory in the future.

## [2.3.1] - 2018-10-16

- Fix SQL query in getPostMeta() where the '\_' was treated as a wildcard pattern.

## [2.3.0] - 2018-05-07

- Wrap ACF PHP field exports in text domain.

## [2.2.0] - 2018-01-15

### Added

- ACF Pro dependency
- Page Builder template

## [2.1.1] - 2017-11-07

### Added

- ACF Helper function `getPostMeta()` to more efficiently get post meta fields from the DB.

### Changed

- Updated vendor autoload require to not interfere with vendor directories in the root.

## [2.1.0] - 2017-10-09

### Added

- Sass Lint task in Gulp

## [2.0.3] - 2017-10-09

### Added

- Transients class to APP/Core to help standardized data caching.

## [2.0.2] - 2017-10-03

### Added

- Added Yarn package manager to replace Bower

### Changed

- Default JS module in `assets/themes/` since we no longer have fluidVids as a package option.

### Removed

- Removed Bower dependencies

## [2.0.1] - 2017-09-26

### Changed

- Fixed sidebar widget markup elements

### Removed

- Removed leftover hybrid core elements

## [2.0.0] - 2017-08-23

### Removed

- Hybrid Core Framework
- Build assets that were in .gitignore

## [1.0.1] - 2017-01-31

### Added

- Media Class to be used when registering additional image sizes
