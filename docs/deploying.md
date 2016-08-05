# Deployments

- Deployments run automatically by codeship when deployments are made.
- Pushing to develop deploys to staging
- Pushing to master deploys to production
- To get codeship to fire the production build you need to update your .git/config file to have:
   [branch "master"]
       mergeoptions = --no-ff

## Setting up Codeship

### Environment variables

- Set `GITHUB_ACCESS_TOKEN` to be your [Github cli access token](https://help.github.com/articles/creating-an-access-token-for-command-line-use/)
- Set `APP_URL` to `localhost`
- Set `APP_KEY` to `MEemBSwgjnAzsotOKL4lFfg8whpFi9pd`
- Set `APP_DEBUG` to `true`
- Set `APP_ENV` to `local`
- Set `TESTDB_DATABASE` to `test`
- Set `TESTDB_USERNAME` to `postgres`
- Set `TESTDB_PASSWORD` to `test`

### Setup commands

```
phpenv global ${cat .php-version}
npm rebuild node-sass
npm install --no-spin
rvm use $(cat .ruby-version) --install
bundle install
composer config -g github-oauth.github.com $GITHUB_ACCESS_TOKEN
composer install --no-interaction --prefer-source --no-dev
```

### Test commands

```
npm run build
npm run lint
npm run test
phpunit -d memory_limit=536M --stop-on-failure
```

### Deployments

- Set up a deploy path for `develop`
- Select the capistrano option
- Set the recipe name to `staging deploy`


- Set up a deploy path for `master`
- Select the capistrano option
- Set the recipe name to `production deploy`
