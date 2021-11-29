const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');

const processStyles = () => {
  return (
    gulp.src('./assets/scss/**/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'nested',
        precision: 3,
        errLogToConsole: true,
        includePaths: [
          'node_modules/bootstrap/scss',
          'node_modules/@glidejs/glide/src/assets/sass'
        ]
      }))
      .on('error', sass.logError)
      .pipe(postcss([autoprefixer(), cssnano()]))
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
