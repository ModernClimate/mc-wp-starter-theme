# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [2.3.2] - 2018-10-26
### Changed
- Updated Bootstrap to 4.1.3.

## [2.3.2] - 2018-10-25
### Added
- Post Types and Taxonomies classes for consistent object registration.

### Removed
- Environment file. Will be handled in root directory in the future.

## [2.3.1] - 2018-10-16
- Fix SQL query in getPostMeta() where the '_' was treated as a wildcard pattern.

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
