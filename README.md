# ocmc

[![CircleCI](https://circleci.com/gh/sagetreesd/ocmc.svg?style=shield)](https://circleci.com/gh/sagetreesd/ocmc)
[![Dashboard ocmc](https://img.shields.io/badge/dashboard-ocmc-yellow.svg)](https://dashboard.pantheon.io/sites/56fc199e-402e-4733-87e4-f50029b384b8#dev/code)
[![Dev Site ocmc](https://img.shields.io/badge/site-ocmc-blue.svg)](http://dev-ocmc.pantheonsite.io/)

## Setting up your local dev env:

Check out the git respository from github.

`$ git checkout git@github.com:sagetreesd/ocmc.git`

Install the dependencies using composer.

`$ composer install`

Start up Lando.

`$ lando start`

Pull the latest database and files from the development environment.

`$ lando pull --code=none --database=dev --files=dev`

Import the latest configs from the codebase to your local development environment.

`$ lando drush cim sync -y`
