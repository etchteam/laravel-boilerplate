# Deployments

- Deployments run automatically by codeship when deployments are made.
- Pushing to `develop` deploys to staging
- Pushing to `master` deploys to production
- To get codeship to fire the production build you need to update your .git/config file to have:
   [branch "master"]
       mergeoptions = --no-ff

## Setting up Codeship

### Environment variables

- Set `APP_URL` to `localhost`
- Set `APP_KEY` to a strong enough key (run `php artisan key:generate` locally and use that)
- Set `APP_ENV` to `testing`
- Set `TESTDB_DATABASE` to `test`
- Set `TESTDB_USERNAME` to `postgres`
- Set `TESTDB_PASSWORD` to `test`
- Set `TESTDB_PORT` to `5432`

### Setup commands

```
phpenv global $(cat .php-version)
npm rebuild node-sass
npm install --no-spin
composer install --no-interaction
composer global require "laravel/envoy=~1.0" --no-interaction
yarn run build
```

### Test commands

```
yarn run lint
phpunit -d memory_limit=536M --stop-on-failure
```

### Deployments

- Set up a deploy path for `develop`
- Select the custom script option
- Enter `envoy run deploy --server=staging`

- Set up a deploy path for `master`
- Select the custom script option
- Enter `envoy run deploy --server=production`
