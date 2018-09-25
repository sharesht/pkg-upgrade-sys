#!/bin/bash

sudo apt install --only-upgrade $1

echo "$1 Package(s) upgraded" | mail -s 'Package Status' root@SHARESHT.in
