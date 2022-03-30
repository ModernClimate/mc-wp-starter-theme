const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');

const processStyles = () => {
  return (
    gulp.src('./assets/scss/**/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        precision: 3,
        errLogToConsole: true,
        includePaths: [
          'node_modules/bootstrap/scss',
        ]
      }))
      .on('error', sass.logError)
      .pipe(postcss([autoprefixer(), cssnano()]))
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./build/css/'))
  );
};

const watchStyles = () => {
  const files = [
    'assets/scss/*.scss',
    'assets/scss/**/*.scss'
  ];
  gulp.watch(files, processStyles);
};

module.exports =  {
  process: processStyles,
  watch: watchStyles
};
