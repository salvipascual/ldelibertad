#!/bin/bash

mkdir logs
touch logs/error.log
touch logs/access.log

mkdir people
mkdir uploads
mkdir cache
touch emails.csv

chmod -R 777 logs
chmod 777 people
chmod 777 uploads
chmod 777 emails.csv
