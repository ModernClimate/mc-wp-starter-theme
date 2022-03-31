const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');

const PATHS = {
  scss: {
    src: './assets/scss',
    dest: './build/css/'
  }
}

const processStyles = () => {
  return (
    gulp.src(`${PATHS.scss.src}/**/*.scss`)
      .pipe(sourcemaps.init())
      .pipe(sass({
        precision: 3,
        errLogToConsole: true,
      }))
      .on('error', sass.logError)
      .pipe(postcss([autoprefixer(), cssnano()]))
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest(PATHS.scss.dest))
  );
}

const watchStyles = () => {
  const files = [
    `${PATHS.scss.src}/*.scss`,
    `${PATHS.scss.src}/**/*.scss`
  ];
  gulp.watch(files, processStyles);
}

const processStylesDev = () => {
  return (
    gulp.src(`${PATHS.scss.src}/**/*.scss`)
      .pipe(sourcemaps.init())
      .pipe(sass({
        precision: 3,
        errLogToConsole: true,
      }))
      .on('error', sass.logError)
      .pipe(postcss([autoprefixer()]))
      .pipe(gulp.dest(PATHS.scss.dest))
  );
}

const watchStylesDev = () => {
  const files = [
    `${PATHS.scss.src}/*.scss`,
    `${PATHS.scss.src}/**/*.scss`
  ];
  gulp.watch(files, processStylesDev);
}

module.exports =  {
  prod: processStyles,
  dev: processStylesDev,
  watch: watchStyles,
  watchDev: watchStylesDev,
}
