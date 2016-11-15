import gulp from 'gulp';
import elixir from 'laravel-elixir';
import runSequence from 'run-sequence';
import './tasks/eslint';
import './tasks/sass-lint';
import './tasks/php-cs';
import config from './config';

// Extend the elixir autoprefix rules with our own
Object.assign(elixir.config.css.autoprefix.options,
  elixir.config.css.autoprefix.options,
  config.styles.autoprefix);

// Extend the elixir sass rules with our own
Object.assign(elixir.config.css.sass,
  config.styles.sass,
  elixir.config.css.sass);

elixir.config.sourcemaps = !elixir.config.production;

elixir((mix) => {
  mix.browserify(config.scripts.src, config.scripts.dest, config.scripts.baseDir)
  .sass(config.styles.src, config.styles.dest)
  .copy(config.images.src, config.images.dest)
  .copy(config.fonts.src, config.fonts.dest)
  .version([config.styles.dest, config.scripts.dest, config.images.dest, config.fonts.dest]);

  if (!elixir.config.production) {
    mix.browserSync(config.browserSync);
  }
});

gulp.task('lint', (done) => {
  runSequence('eslint', 'scss-lint', 'php-cs', () => {
    done();
  });
});
