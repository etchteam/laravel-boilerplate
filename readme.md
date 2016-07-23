# Red Bullet Laravel Boilerplate

## Introduction
This is Red Bullet's Laravel Boilerplate build.
It uses [Composer](https://getcomposer.org/) for PHP Dependencies, [NPM](https://www.npmjs.com/) for
client side dependencies, [Browserify](http://browserify.org/) for gluing the JS together and [Sass](http://sass-lang.com/) for styling.

## Running it on your machine

### Pre-requisites

[Laravel Homestead](https://laravel.com/docs/5.2/homestead)
[git flow](https://github.com/nvie/gitflow)

### Install Dependencies

- run `composer install`
- run `rvm use ${cat .ruby-version} --install` (assuming you use [rvm](https://rvm.io/))
- run `bundle install`
- run `npm install`

### Configure Installation

- Follow the [Homestead guide](https://laravel.com/docs/5.2/homestead#adding-additional-sites).
 Note that you'll also have to edit your hosts file, following [the "**The hosts file**" section](https://laravel.com/docs/5.2/homestead#configuring-homestead).

### Run the site

- Update the config in `/gulpfile.babel.js/config.js` with your vhost url in `config.borwserSync`
- run `npm run serve` to fire up the site with Browser Sync

## Linting

`npm run lint` is run in a pre-commit hook, and if it fails, your code will not be committed. We
 also run the linter as part of our tests on Codeship.

We run four linters, [eslint](eslint.org) for JS, [scss-lint](https://github.com/brigade/scss-lint/)
 for Sass, [phplint](https://www.npmjs.com/package/phplint) for php, and [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

### Set up linting in your Text Editor

Using [Atom](https://atom.io/) you can set up the `scss-lint`, `eslint`, `linter-php`, and
 `linter-phpcs`
 automatically by installing the following plugins:

- https://atom.io/packages/linter
- https://atom.io/packages/linter-scss-lint
- https://atom.io/packages/linter-eslint
- https://atom.io/packages/linter-php
- https://atom.io/packages/linter-phpcs

via `apm`: `apm install linter linter-scss-lint linter-eslint linter-php linter-phpcs`

Using [SublimeText](https://www.sublimetext.com/) you can set up the scss-lint and eslint following
these instructions

- http://www.sublimelinter.com/en/latest/
- http://jonathancreamer.com/setup-eslint-with-es6-in-sublime-text/
- https://github.com/attenzione/SublimeLinter-scss-lint
- https://github.com/SublimeLinter/SublimeLinter-phplint
- https://github.com/benmatselby/sublime-phpcs

Note that you will need phpcs installed globally for it to work in your editor. You can do that with
`composer global require "squizlabs/php_codesniffer=*"`

## Git

We use [git flow](https://github.com/nvie/gitflow) for repository management. If you haven't used
 git flow before, then please [read this handy article](http://jeffkreeftmeijer.com/2010/why-arent-you-using-git-flow/)
 to get a handle on things before starting.

Master must **always be production ready**. Open pull requests to merge branches into master, and
 ensure they are reviewed by at least one developer.

### Committing

`npm run lint` is run in a pre-commit hook, and if it fails, your code will not be committed.

Commit messages are validated using [validate-commit-msg](https://github.com/kentcdodds/validate-commit-msg).

Valid types are:

- feat (feature)
- fix (bug fix)
- docs (documentation)
- style (formatting, missing semi colons, etc…)
- refactor
- test (when adding missing tests)
- chore (maintenance)

Commit messages should use the imperative, present tense: “change” not “changed” nor “changes”.

Example commit messages:

`feat: Add linting for javascript files in the /component folder`
`chore: Update eslint`

## Extending

### Adding Composer packages

- Plugins should be installed and updated via Composer
- e.g. to install sentry this is done via `composer require sentry/sentry-laravel` ran from the root
directory

### Adding NPM packages

These should be installed with the --save-dev flag

## Seeding

To seed, run `php artisan db:seed`.

### Build a new seed

- See (the Laravel docs)[https://laravel.com/docs/5.2/seeding].

## Deployments

- Deployments run automatically by codeship when deployments are made.
- Pushing to master deploys to staging
- Pushing to production deploys to production
- To get codeship to fire the production build you need to update your .git/config file to have:
   [branch "production"]
       mergeoptions = --no-ff

### Setting up Codeship

#### Environment variables

- Set `GITHUB_ACCESS_TOKEN` to be your [Github cli access token](https://help.github.com/articles/creating-an-access-token-for-command-line-use/)
- Set `APP_URL` to `localhost`
- Set `APP_KEY` to `MEemBSwgjnAzsotOKL4lFfg8whpFi9pd`
- Set `APP_DEBUG` to `true`
- Set `APP_ENV` to `local`
- Set `TESTDB_DATABASE` to `test`
- Set `TESTDB_USERNAME` to `postgres`
- Set `TESTDB_PASSWORD` to `test`

#### Setup commands

```
phpenv global ${cat .php-version}
npm rebuild node-sass
npm install --no-spin
rvm use $(cat .ruby-version) --install
bundle install
composer config -g github-oauth.github.com $GITHUB_ACCESS_TOKEN
composer install --no-interaction --prefer-source --no-dev
```

#### Test commands

```
npm run build
npm run lint
npm run test
phpunit -d memory_limit=536M --stop-on-failure
```

#### Deployments

- Set up a deploy path for `develop`
- Select the capistrano option
- Set the recipe name to `staging deploy`


- Set up a deploy path for `master`
- Select the capistrano option
- Set the recipe name to `production deploy`

## Notes

The `serve` script currently calls `gulp && gulp watch`. This is less than ideal, but is a
 workaround for this bug: https://github.com/laravel/elixir/issues/126 Once that is fixed, we should
 be able to change the `serve` script to `gulp watch`, which is a lot nicer.
