# Etch Laravel Boilerplate

[![Build Status](https://travis-ci.org/etchteam/laravel-boilerplate.svg?branch=develop)](https://travis-ci.org/etchteam/laravel-boilerplate)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/63afe3d050c34afbb80154d33065a942)](https://www.codacy.com/app/etch/laravel-boilerplate?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=etchteam/laravel-boilerplate&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/63afe3d050c34afbb80154d33065a942)](https://www.codacy.com/app/etch/laravel-boilerplate?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=etchteam/laravel-boilerplate&amp;utm_campaign=Badge_Coverage)
[![Known Vulnerabilities](https://snyk.io/test/github/etchteam/laravel-boilerplate/badge.svg)](https://snyk.io/test/github/etchteam/laravel-boilerplate)

## Introduction

This is Etch's Laravel Boilerplate build.

It uses [Composer](https://getcomposer.org/) for PHP Dependencies, [Yarn](https://yarnpkg.com) for
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
