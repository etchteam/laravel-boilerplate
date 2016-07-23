import gulp from 'gulp';
import './tasks/eslint';
import './tasks/scss-lint';
import './tasks/php-lint';
import './tasks/php-cs';
import config from './config';
import elixir from 'laravel-elixir';

// Extend the elixir autoprefix rules with our own
Object.assign(elixir.config.css.autoprefix.options,
  elixir.config.css.autoprefix.options,
  config.styles.autoprefix);

// Extend the elixir sass rules with our own
Object.assign(elixir.config.css.sass,
  config.styles.sass,
  elixir.config.css.sass);

elixir((mix) => {
  mix.browserify(config.scripts.src, config.scripts.dest, config.scripts.baseDir);
  mix.sass(config.styles.src, config.styles.dest);
  mix.version([config.styles.dest, config.scripts.dest]);

  if (!elixir.config.production) {
    mix.browserSync(config.browserSync);
  }
});

gulp.task('lint', ['eslint', 'scss-lint', 'php-lint', 'php-cs']);
