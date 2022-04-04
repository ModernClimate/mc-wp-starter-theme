import gulp from 'gulp';
import sourcemaps from 'gulp-sourcemaps';
import postcss from 'gulp-postcss';
import cssnano from 'cssnano';
import autoprefixer from 'autoprefixer';
import rename from 'gulp-rename';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass( dartSass );

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

export default {
  prod: processStyles,
  dev: processStylesDev,
  watch: watchStyles,
  watchDev: watchStylesDev,
}
