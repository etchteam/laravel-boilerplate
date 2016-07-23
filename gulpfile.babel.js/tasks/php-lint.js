import gulp from 'gulp';
import config from '../config';
import phplint from 'gulp-phplint';

gulp.task('php-lint', () => {
  return gulp.src(config.phplint.src)
    .pipe(phplint('', config.phplint.options))
    .pipe(phplint.reporter('fail'));
});
