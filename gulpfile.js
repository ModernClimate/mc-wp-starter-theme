// Include gulp
var $ = require('gulp-load-plugins')();
var gulp = require('gulp');
var sequence = require('run-sequence');
var sassLint = require('gulp-sass-lint');
var phpcs = require('gulp-phpcs');

function swallowError() {
  console.log('UGLIFY ERROR');
  this.emit('end');
}

/**
 * File paths to various assets are defined here.
 */
var PATHS = {
  php: [
    '**/*.php',
    '!vendor/**/*.*'
  ],
  sass: [
    'assets/scss/*.scss',
    'assets/scss/**/*.scss'
  ],
  jsVendor: [
    'node_modules/bootstrap/dist/js/bootstrap.js'
  ],
  jsTheme: [
    'assets/js/theme/*.js',
    'assets/js/theme.js'
  ]
};

// Concatenate & Minify all bower dependency javascript files
gulp.task('build:scripts:vendor', function () {
  return gulp.src(PATHS.jsVendor)
    .pipe($.concat('vendor.js'))
    .pipe($.rename({
      suffix: '.min'
    }))
    .pipe($.uglify().on('error', swallowError))
    .pipe(gulp.dest('build/js'));
});

// Concatenate & Minify all theme javascript files
gulp.task('dev:scripts:vendor', function () {
  return gulp.src(PATHS.jsVendor)
    .pipe($.concat('vendor.js'))
    .pipe($.rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('build/js'));
});

// Concatenate & Minify all theme javascript files
gulp.task('build:scripts:theme', function () {
  return gulp.src(PATHS.jsTheme)
    .pipe($.concat('theme.js'))
    .pipe($.rename({
      suffix: '.min'
    }))
    .pipe($.uglify().on('error', swallowError))
    .pipe(gulp.dest('build/js'));
});

// Concatenate & Minify all theme javascript files
gulp.task('dev:scripts:theme', function () {
  return gulp.src(PATHS.jsTheme)
    .pipe($.concat('theme.js'))
    .pipe($.rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('build/js'));
});

// Copy bower package fonts into version control
gulp.task('build:fonts', function () {
  return gulp.src(PATHS.fonts)
    .pipe(gulp.dest('assets/fonts'));
});

// Compile min CSS
gulp.task('build:styles', function () {
  return gulp.src('assets/scss/main.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass,
      outputStyle: 'compressed'
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe($.rename({
      basename: "theme",
      suffix: '.min'
    }))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest('build/css'))
});

// Compile uncompressed CSS
gulp.task('dev:styles', function () {
  return gulp.src('assets/scss/main.scss')
    .pipe($.sass({
      includePaths: PATHS.sass,
      outputStyle: 'expanded',
      indentType: 'tab',
      indentWidth: 1
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe($.rename({
      basename: "theme",
      suffix: '.min'
    }))
    .pipe(gulp.dest('build/css'))
});

// run JS lint on theme scripts
gulp.task('lint', function () {
  return gulp.src(PATHS.jsTheme)
    .pipe($.eslint())
    .pipe($.eslint.format())
    .pipe($.eslint.failAfterError());
});

// run SCSS lint on theme styles
gulp.task('sass-lint', function () {
  return gulp.src(PATHS.sass)
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
});

gulp.task('phpcs', function () {
  return gulp.src(PATHS.php)
  // Validate files using PHP Code Sniffer
    .pipe(phpcs({
      bin: 'vendor/squizlabs/php_codesniffer/bin/phpcs',
      standard: 'PSR2',
      warningSeverity: 0
    }))
    // Log all problems that was found
    .pipe(phpcs.reporter('log'));
});

// Watch tasks
gulp.task('watch', function () {
  // Watch .js files
  gulp.watch(PATHS.jsTheme, ['build:scripts:theme', 'lint']);
  // Watch .scss files
  gulp.watch(PATHS.sass, ['build:styles', 'sass-lint']);
});

// DEV Watch tasks
gulp.task('watch:dev', function () {
  // Watch .js files
  gulp.watch(PATHS.jsTheme, ['dev:scripts:theme', 'lint']);
  // Watch .scss files
  gulp.watch(PATHS.sass, ['dev:styles', 'sass-lint']);
});

// Build and minify the theme assets
gulp.task('build', function (done) {
  sequence([
    'lint',
    'build:scripts:vendor',
    'build:scripts:theme',
    'sass-lint',
    'build:styles'
  ], done);
});

// Build the theme assets un-minified
gulp.task('dev', function (done) {
  sequence([
    'lint',
    'dev:scripts:vendor',
    'dev:scripts:theme',
    'sass-lint',
    'dev:styles'
  ], done);
});

// Default task, run the build
gulp.task('default', ['build']);