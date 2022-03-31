const gulp = require('gulp');

// Import tasks
const taskDir = './gulp-tasks';
const styles = require(`${taskDir}/styles`);
const themeScripts = require(`${taskDir}/themeScripts`);
const php = require(`${taskDir}/php`);

// Define grouped tasks
const watch = gulp.parallel(styles.watch, themeScripts.watch);
const watchDev = gulp.parallel(styles.watchDev, themeScripts.watchDev);
const build = gulp.series(styles.prod, themeScripts.prod, php.codeSniffer);
const buildDev = gulp.series(styles.dev, themeScripts.dev, php.codeSniffer);
const all = gulp.series(styles.prod, styles.dev, themeScripts.prod, themeScripts.dev, php.codeSniffer);

exports.default = all;
exports.watch = watch;
exports.watchDev = watchDev;
exports.build = build;
exports.buildDev = buildDev;

exports.js = themeScripts.prod;
exports.jsDev = themeScripts.dev;

exports.styles = styles.prod;
exports.stylesDev = styles.dev;

exports.phpcs = php.codeSniffer;
exports.phpcbf = php.codeBeautifier;
