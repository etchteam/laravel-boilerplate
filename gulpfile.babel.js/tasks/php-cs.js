import gulp from 'gulp';
import phpcs from 'gulp-phpcs';
import config from '../config';

gulp.task('php-cs', () => {
  return gulp.src(config.phpcs.src)
    .pipe(phpcs(config.phpcs.options))
    .pipe(phpcs.reporter('log'))
    .pipe(phpcs.reporter('fail'));
});
