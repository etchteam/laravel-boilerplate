# Contributing

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

- feat: A new feature
- fix: A bug fix
- docs: Documentation only changes
- style: Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
- refactor: A code change that neither fixes a bug nor adds a feature
- perf: A code change that improves performance
- test: Adding missing tests
- chore: Changes to the build process or auxiliary tools and libraries such as documentation generation

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

- See (the Laravel docs)[https://laravel.com/docs/master/seeding].
