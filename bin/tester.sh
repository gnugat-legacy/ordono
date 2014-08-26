#!/usr/bin/env bash

ordono="$( cd "$( dirname "${BASH_SOURCE[0]}" )/.." && pwd )"

echo '[phpspec] Running specification tests'
$ordono/vendor/bin/phpspec run

phpspec=$?

echo '[phpunit] Running example tests'
$ordono/vendor/bin/phpunit

phpunit=$?

if [ "$phpspec" -eq 0 ] && [ "$phpunit" -eq 0 ]; then
    exit 0
else
    exit 1
fi
