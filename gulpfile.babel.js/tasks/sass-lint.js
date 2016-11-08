import gulp from 'gulp';
import sassLint from 'gulp-sass-lint';
import config from '../config';

gulp.task('sass-lint', () => {
  return gulp.src(config.sassLint.src)
    .pipe(sassLint(config.sassLint.options))
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError());
});
