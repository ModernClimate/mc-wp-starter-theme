const gulp = require('gulp');
const phpcs = require('gulp-phpcs');

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

module.exports =  {
  codeSniffer: phpCodeSniffer,
}
