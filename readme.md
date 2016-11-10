# Etch Laravel Boilerplate

[ ![Codeship Status for etchteam/laravel-boilerplate](https://app.codeship.com/projects/ef55f8e0-88d5-0134-c2fc-4a60797e4d29/status?branch=develop)](https://app.codeship.com/projects/184065)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/63afe3d050c34afbb80154d33065a942)](https://www.codacy.com/app/etch/laravel-boilerplate?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=etchteam/laravel-boilerplate&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/63afe3d050c34afbb80154d33065a942)](https://www.codacy.com/app/etch/laravel-boilerplate?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=etchteam/laravel-boilerplate&amp;utm_campaign=Badge_Coverage)

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
