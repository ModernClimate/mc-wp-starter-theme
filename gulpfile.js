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
		'bower_components/bootstrap-sass/assets/fonts/bootstrap/*'
	],
	sass: [
		'assets/scss/*.scss',
		'assets/scss/**/*.scss'
	],
	jsBootstrap: [
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js',
		// 'bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js',
		'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
	],
	jsTheme: [
		'assets/js/theme/*.js',
		'assets/js/theme.js'
	],
	jsVendors: [
		'assets/js/vendor/*.js'
	]
};

// Concatenate bootstraps javascript files
gulp.task('build:scripts:bootstrap', function () {
	return gulp.src(PATHS.jsBootstrap)
		.pipe($.concat('bootstrap.js'))
		.pipe($.rename({
			suffix: '.min'
		}))
		.pipe($.uglify())
		.pipe(gulp.dest('build/js'));
});

// Concatenate & Minify all theme javascript files
gulp.task('build:scripts:theme', function () {
	return gulp.src(PATHS.jsTheme)
		.pipe($.concat('theme.js'))
		.pipe($.rename({
			suffix: '.min'
		}))
		.pipe($.uglify())
		.pipe(gulp.dest('build/js'));
});

//  Concatenate & Minify JS Vendor scripts
gulp.task('build:scripts:vendor', function () {
	return gulp.src(PATHS.jsVendors)
		.pipe($.concat('vendor.js'))
		.pipe($.rename({
			suffix: '.min'
		}))
		.pipe($.uglify())
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
				outputStyle: 'compressed',
				indentType: 'tab',
				indentWidth: 1
			})
			.on('error', $.sass.logError))
		.pipe($.rename({
			basename: "theme",
			suffix: '.min'
		}))
		.pipe($.cleanCss())
		.pipe($.sourcemaps.write('.'))
		.pipe(gulp.dest('build/css'))
});

// Compile uncompressed CSS
gulp.task('build:styles:dev', function () {
	return gulp.src('assets/scss/app.scss')
		.pipe($.sourcemaps.init())
		.pipe($.sass({
				includePaths: PATHS.sass,
				indentType: 'tab',
				indentWidth: 1
			})
			.on('error', $.sass.logError))
		.pipe($.rename({
			basename: "theme"
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
	gulp.watch(PATHS.jsVendors, ['build:scripts:vendor']);
	// Watch .scss files
	gulp.watch(PATHS.sass, ['build:styles']);
});

// DEV Watch tasks
gulp.task('watch:dev', function () {
	// Watch .js files
	gulp.watch(PATHS.jsTheme, ['build:scripts:theme', 'lint']);
	gulp.watch(PATHS.jsVendors, ['build:scripts:vendor']);
	// Watch .scss files
	gulp.watch(PATHS.sass, ['build:styles']);
});

// Build the theme assets
gulp.task('build', function (done) {
	sequence([
		'build:scripts:bootstrap',
		'build:scripts:theme',
		'build:scripts:vendor',
		'build:fonts',
		'build:styles'
	], done);
});

// Default task, run the build
gulp.task('default', ['build']);