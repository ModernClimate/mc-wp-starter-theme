const gulp = require('gulp');
const phpcs = require('gulp-phpcs');
// const phpcbf = require('gulp-phpcbf');

const styles = require('./gulp-tasks/styles');
const themeScripts = require('./gulp-tasks/themeScripts');
const adminScripts = require('./gulp-tasks/adminScripts');
const vendorScripts = require('./gulp-tasks/vendorScripts');

const PATHS = {
  php: [
    '**/*.php',
    '!blocks/**/*.*',
    '!vendor/**/*.*'
  ]
};

// run php code sniffer on theme files
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

// run php code sniffer on theme files
// function phpCodeBeautifier() {
//   return (
//     gulp.src(PATHS.php)
//       .pipe(phpcbf({
//         bin: './vendor/squizlabs/php_codesniffer/bin/phpcbf',
//         standard: 'PSR2',
//         warningSeverity: 0
//       }))
//       .pipe(gulp.dest('.'))
//   );
// }

const watch = gulp.parallel(styles.watch, themeScripts.watch, adminScripts.watch);
// const build = gulp.series(styles.process, themeScripts.process, adminScripts.process, vendorScripts.process, phpCodeSniffer);
const build = gulp.series(styles.process, themeScripts.process, adminScripts.process, phpCodeSniffer);

exports.watch = watch;
exports.build = build;
exports.default = build;
