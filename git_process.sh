#!/bin/bash

echo 'Starting the spaceship'

git add . && git commit -m "$1" && git push

echo "Arrived at LZ ...je repète l'engin a attérit "
