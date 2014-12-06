#!/bin/bash

php codecept.phar run || exit 1

git add .
git commit -m a
git pull --rebase

php codecept.phar run || exit 1

git push
