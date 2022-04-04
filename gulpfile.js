import gulp from 'gulp';

// Import tasks
import styleTasks from './gulp-tasks/styles.js';
import themeScripts from './gulp-tasks/themeScripts.js';
import php from './gulp-tasks/php.js';

// Define grouped tasks
export default gulp.series(styleTasks.prod, styleTasks.dev, themeScripts.prod, themeScripts.dev, php.codeSniffer);
export const watch = gulp.parallel(styleTasks.watch, themeScripts.watch);
export const watchDev = gulp.parallel(styleTasks.watchDev, themeScripts.watchDev);
export const build = gulp.series(styleTasks.prod, themeScripts.prod, php.codeSniffer);
export const buildDev = gulp.series(styleTasks.dev, themeScripts.dev, php.codeSniffer);

export const js = themeScripts.prod;
export const jsDev = themeScripts.dev;
export const styles = styleTasks.prod;
export const stylesDev = styleTasks.dev;
export const phpcs = php.codeSniffer;
