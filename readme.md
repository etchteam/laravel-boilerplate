# Etch Laravel Boilerplate

## Introduction

This is Etch's Laravel Boilerplate build.

It uses [Composer](https://getcomposer.org/) for PHP Dependencies, [NPM](https://www.npmjs.com/) for
client side dependencies, [Browserify](http://browserify.org/) for gluing the JS together and [Sass](http://sass-lang.com/) for styling.

## Documentation

- [Getting Started](docs/getting-started.md)
- [Contributing](docs/contributing.md)
- [Linting](docs/linting.md)
- [Deploying](docs/deploying.md)

## Notes

The `serve` script currently calls `gulp && gulp watch`. This is less than ideal, but is a
 workaround for this bug: https://github.com/laravel/elixir/issues/126 Once that is fixed, we should
 be able to change the `serve` script to `gulp watch`, which is a lot nicer.
