#!/bin/bash          
git init
git add -A
read -p "commit: " c
git commit -m "$c"
git push