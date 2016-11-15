# Deployments

- Deployments are run automatically by travis on git push
- Pushing to `develop` deploys to staging
- Pushing to `master` deploys to production

## Environment variables

You'll need to supply the following environment variables, with appropriate values:

```
GIT_REPO=https://github.com/etchteam/laravel-boilerplate.git

STAGING_SSH=null
STAGING_PATH=null
STAGING_BRANCH=develop
STAGING_USER=null

PRODUCTION_SSH=null
PRODUCTION_PATH=null
PRODUCTION_BRANCH=master
PRODUCTION_USER=null
```

## Manual deploys

Assuming you have ssh access to the correct servers, you should be able to deploy to staging with
 `envoy run deploy`, and to production with `envoy run deploy --server=production`
