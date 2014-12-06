#!/bin/bash

php codecept.phar run || exit 1

git add .
git commit -m a
git pull --rebase
git push
