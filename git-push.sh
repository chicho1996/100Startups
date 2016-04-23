#!/bin/bash          
git init
git add -A
git reset sftp-config.json
read -p "commit: " c
git commit -m "$c"
git push