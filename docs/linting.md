# Linting

`npm run lint` is run in a pre-commit hook, and if it fails, your code will not be committed. We
 also run the linter as part of our tests on Codeship.

We run four linters, [eslint](eslint.org) for JS, [sass-lint](https://github.com/sasstools/sass-lint/)
 for Sass, [phplint](https://www.npmjs.com/package/phplint) for php, and [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

## Set up linting in your Text Editor

Using [Atom](https://atom.io/) you can set up the `sass-lint`, `eslint`, `linter-php`, and
 `linter-phpcs`
 automatically by installing the following plugins:

- https://atom.io/packages/linter
- https://atom.io/packages/linter-sass-lint
- https://atom.io/packages/linter-eslint
- https://atom.io/packages/linter-php
- https://atom.io/packages/linter-phpcs

via `apm`: `apm install linter linter-sass-lint linter-eslint linter-php linter-phpcs`

Using [SublimeText](https://www.sublimetext.com/) you can set up the `sass-lint` and `eslint` following
these instructions

- http://www.sublimelinter.com/en/latest/
- http://jonathancreamer.com/setup-eslint-with-es6-in-sublime-text/
- https://github.com/skovhus/SublimeLinter-contrib-sass-lint
- https://github.com/SublimeLinter/SublimeLinter-phplint
- https://github.com/benmatselby/sublime-phpcs

Note that you will need phpcs installed globally for it to work in your editor. You can do that with
`composer global require "squizlabs/php_codesniffer=*"`
