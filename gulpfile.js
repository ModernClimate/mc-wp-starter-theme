// Include gulp
var $ = require('gulp-load-plugins')();
var gulp = require('gulp');
var sequence = require('run-sequence');

function swallowError() {
    console.log('UGLIFY ERROR');
    this.emit('end');
}

/**
 * File paths to various assets are defined here.
 */
var PATHS = {
    fonts: [
        'node_modules/bootstrap-sass/assets/fonts/bootstrap/*'
    ],
    sass: [
        'assets/scss/*.scss',
        'assets/scss/**/*.scss'
    ],
    jsVendor: [
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        'node_modules/parsleyjs/dist/parsley.js'
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
        .pipe($.rename({
            basename: "theme",
            suffix: '.min'
        }))
        .pipe(gulp.dest('build/css'))
});

// run JS lint on theme scripts
gulp.task('lint', function () {
    return gulp.src(PATHS.jsTheme)
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish'))
        .pipe($.jscs())
        .pipe($.jscs.reporter());
});

// Watch tasks
gulp.task('watch', function () {
    // Watch .js files
    gulp.watch(PATHS.jsTheme, ['build:scripts:theme', 'lint']);
    // Watch .scss files
    gulp.watch(PATHS.sass, ['build:styles']);
});

// DEV Watch tasks
gulp.task('watch:dev', function () {
    // Watch .js files
    gulp.watch(PATHS.jsTheme, ['dev:scripts:theme', 'lint']);
    // Watch .scss files
    gulp.watch(PATHS.sass, ['dev:styles']);
});

// Build and minify the theme assets
gulp.task('build', function (done) {
    sequence([
        'build:scripts:vendor',
        'build:scripts:theme',
        'build:fonts',
        'build:styles'
    ], done);
});

// Build the theme assets un-minified
gulp.task('dev', function (done) {
    sequence([
        'dev:scripts:vendor',
        'dev:scripts:theme',
        'build:fonts',
        'dev:styles'
    ], done);
});

// Default task, run the build
gulp.task('default', ['build']);