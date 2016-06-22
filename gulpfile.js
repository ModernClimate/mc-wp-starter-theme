var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var bowerFiles = require('main-bower-files');

function swallowError() {
  console.log( 'UGLIFY ERROR' );
  this.emit('end');
}

// Compile all theme assets
gulp.task('build', plugins.sequence(
  'build:bower',
  'build:scripts',
  'build:fonts',
  'build:styles'
));

// Concatenate all bower javascript file
gulp.task('build:bower', function () {
  return gulp.src( bowerFiles({filter:/\.js$/i}) )
    .pipe( plugins.concat('bower.js') )
    .pipe( gulp.dest('assets/dist') );
});

// Minify all local javascript files
gulp.task('build:scripts', function () {
  return gulp.src(['assets/js/*.js'])
    .pipe( plugins.concat('global.js') )
    .pipe( plugins.uglify().on('error', swallowError) )
    .pipe( gulp.dest('assets/dist') );
});

// Copy bower package fonts into version control
gulp.task('build:fonts', function () {
  var fonts = [
    'bower_components/bootstrap-sass/assets/fonts/bootstrap/*'
  ];
  return gulp.src(fonts)
    .pipe(gulp.dest('assets/fonts'));
});

// Compile min CSS
gulp.task('build:styles', function () {
  return gulp.src(['assets/scss/style.scss'])
    .pipe( plugins.sass({'outputStyle':'compressed', 'precision': 8}).on('error', plugins.sass.logError) )
    .pipe( gulp.dest('assets/dist') );
});

// Compile all theme assets uncompressed for debugging
gulp.task('build:dev', plugins.sequence(
  'build:bower',
  'build:scripts:dev',
  'build:fonts',
  'build:styles:dev'
));

// Concatenate uncompressed javascript files
gulp.task('build:scripts:dev', function () {
  return gulp.src(['assets/js/*.js'])
    .pipe( plugins.concat('global.js') )
    .pipe( gulp.dest('assets/dist') );
});

// Compile uncompressed CSS
gulp.task('build:styles:dev', function () {
  return gulp.src(['assets/scss/style.scss'])
    .pipe( plugins.sass({'precision': 8}).on('error', plugins.sass.logError) )
    .pipe( gulp.dest('assets/dist') );
});

// Watch Assets
gulp.task('watch', function () {
  gulp.watch(['assets/scss/**/*.scss'], ['build:styles']);
  gulp.watch(['assets/js/*.js'], ['build:scripts', 'lint']);
});

gulp.task('watch:dev', function () {
  gulp.watch(['assets/scss/**/*.scss'], ['build:styles:dev']);
  gulp.watch(['assets/js/*.js'], ['build:scripts:dev', 'lint']);
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
