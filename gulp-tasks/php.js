const gulp = require('gulp');
const phpcs = require('gulp-phpcs');
const phpcbf = require('gulp-phpcbf');

const PATHS = {
  php: [
    '**/*.php',
    '!blocks/**/*.*',
    '!vendor/**/*.*'
  ]
}

// Run php code sniffer on theme files
function phpCodeSniffer() {
  return (
    gulp.src(PATHS.php)
      .pipe(phpcs({
        bin: './vendor/squizlabs/php_codesniffer/bin/phpcs',
        standard: 'PSR2',
        warningSeverity: 0,
        colors: 1,
        ignore: ['node_modules', 'build']
      }))
      .pipe(phpcs.reporter('log'))
  );
}

// Run php code sniffer on theme files
function phpCodeBeautifier() {
  return (
    gulp
      .src(PATHS.php)
      .pipe(phpcbf({
        bin: './vendor/squizlabs/php_codesniffer/bin/phpcbf',
        standard: 'PSR2',
        warningSeverity: 0
      }))
      .pipe(gulp.dest('.'))
  );
}

module.exports =  {
  codeSniffer: phpCodeSniffer,
  codeBeautifier: phpCodeBeautifier,
}
