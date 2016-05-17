var gulp = require('gulp');
var gutil = require('gulp-util');
var plugins = require('gulp-load-plugins')();
var bowerFiles = require('main-bower-files');

gulp.task('build', plugins.sequence(
  'build:bower',
  'build:scripts',
  'build:fonts',
  'build:styles'
));

gulp.task('build:bower', function () {
  return gulp.src( bowerFiles({filter:/\.js$/i}) )
    .pipe( plugins.concat('bower.js') )
    .pipe( gulp.dest('assets/dist') );
});

gulp.task('build:scripts', function () {
  return gulp.src(['assets/js/*.js'])
    .pipe( plugins.concat('global.js') )
    .pipe( plugins.uglify().on('error', gutil.log) )
    .pipe( gulp.dest('assets/dist') );
});

gulp.task('build:fonts', function () {
  var fonts = [
    'bower_components/bootstrap-sass/assets/fonts/bootstrap/*'
  ];
  return gulp.src(fonts)
    .pipe(gulp.dest('assets/fonts'));
});

gulp.task('build:styles', function () {
  return gulp.src(['assets/scss/style.scss'])
    .pipe( plugins.sass({'outputStyle':'compressed', 'precision': 8}).on('error', plugins.sass.logError) )
    .pipe( gulp.dest('assets/dist') );
});

// Watch Assets
gulp.task('watch', function () {
  gulp.watch(['assets/scss/**/*.scss'], ['build:styles']);
  gulp.watch(['assets/js/*.js'], ['build:scripts', 'lint']);
});

// Linting
var filesToLint = [
  'assets/js/*.js',
  'gulpfile.js'
];

gulp.task('lint', function () {
  return gulp.src(filesToLint)
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('jshint-stylish'))
    .pipe(plugins.jscs())
    .pipe(plugins.jscs.reporter());
});
