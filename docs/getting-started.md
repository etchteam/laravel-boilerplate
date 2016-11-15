# Getting started

## Pre-requisites

- [Laravel Homestead](https://laravel.com/docs/master/homestead)

## Install Dependencies

- run `composer install`
- run `npm install -g yarn` (assuming you don't have yarn installed already)
- run `yarn install`

## Configure Installation

- Follow the [Homestead guide](https://laravel.com/docs/master/homestead#adding-additional-sites).
 Note that you'll also have to edit your hosts file, following [the "**The hosts file**" section](https://laravel.com/docs/master/homestead#configuring-homestead).

Once homestead is setup, run the following (in order)

- `cp .env.example .env`
- `chmod +x artisan`
- `./artisan key:generate`

Either remove the `SENTRY_DSN` entry from your `.env` file, or change it to your development dsn.

## Run the site

- Update the config in `/gulpfile.babel.js/config.js` with your vhost url in `config.browserSync`
- run `yarn run serve` to fire up the site with Browser Sync
