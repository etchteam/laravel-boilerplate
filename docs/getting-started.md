# Getting started

## Pre-requisites

- [Laravel Homestead](https://laravel.com/docs/5.2/homestead)
- [git flow](https://github.com/nvie/gitflow)

## Install Dependencies

- run `composer install`
- run `rvm use $(cat .ruby-version) --install` (assuming you use [rvm](https://rvm.io/))
- run `bundle install`
- run `yarn install`

## Configure Installation

- Follow the [Homestead guide](https://laravel.com/docs/5.2/homestead#adding-additional-sites).
 Note that you'll also have to edit your hosts file, following [the "**The hosts file**" section](https://laravel.com/docs/5.2/homestead#configuring-homestead).

Once homestead is setup, run the following (in order)

- `cp .env.example .env`
- `chmod +x artisan`
- `./artisan key:generate`

Either remove the `SENTRY_DSN` entry from your `.env` file, or change it to your development dsn.

## Run the site

- Update the config in `/gulpfile.babel.js/config.js` with your vhost url in `config.browserSync`
- run `yarn run serve` to fire up the site with Browser Sync
