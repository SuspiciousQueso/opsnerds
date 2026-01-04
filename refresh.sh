#!/usr/bin/env bash/bin/bash
## Refresh project in current directory

docker compose down

git pull origin master

docker compose up -d --build