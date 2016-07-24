import path from 'path';
import elixir from 'laravel-elixir';

// The purpose of this file is to provide easy access to the key config aspects of this gulp file.
// It is intended to only deal with simple modifications, and is not meant to make the rest of
// the gulpfile unopinionated.
// E.g.
// - Do put things here that might change as project goes along and is easy to change
// i.e cssnext modules
// - Don't use this as a way to make the rest of the gulpfile project independent (thereby making
// the gulp more complex). It is fine and far easier to edit the gulp for lots of things

const assets = elixir.config.assetsPath;
const app = elixir.config.appPath;
const dest = elixir.config.publicPath;

const config = { assets, app, dest };

config.styles = {
  src: ['main.scss'],
  dest: `${dest}/styles/main.css`,
  autoprefix: {
    features: { colorRgba: false },
    browsers: '> 1%',
  },
  sass: {
    folder: 'styles',
    includePaths: ['node_modules', 'resources/components'],
  },
};

config.scripts = {
  baseDir: `${assets}/scripts/`,
  src: ['main.js'],
  dest: `${dest}/scripts/main.js`,
};

config.browserSync = {
  port: 9000,
  proxy: 'boilerplate.app',
  notify: false,
};

config.scssLint = {
  src: [
    `${assets}/styles/**/*.scss`,
  ],
  options: {
    config: path.join(__dirname, '../.scss-lint.yml'),
  },
};

config.eslint = {
  src: [`${assets}/scripts/**/*.js`, 'gulpfile.babel.js/**/*.js'],
};

config.phplint = {
  src: [
    '**/*.php',
    '!vendor/**/*.php',
  ],
  options: {
    skipPassedFiles: true,
  },
};

config.phpcs = {
  src: [
    `${app}/**/*.php`,
    'config/**/*.php',
    'bootstrap/**/*.php',
    '!bootstrap/cache/services.php',
  ],
  options: {
    bin: './vendor/bin/phpcs',
    standard: 'PSR2',
    warningSeverity: 0,
  },
};

export default config;
