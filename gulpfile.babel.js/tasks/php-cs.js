import gulp from 'gulp';
import config from '../config';
import phpcs from 'gulp-phpcs';

gulp.task('php-cs', () => {
  return gulp.src(config.phpcs.src)
    .pipe(phpcs(config.phpcs.options))
    .pipe(phpcs.reporter('log'))
    .pipe(phpcs.reporter('fail'));
});
