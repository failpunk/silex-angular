#!/bin/bash

echo 'Building Frontend'

composer update

bower cache clean
bower update

compass compile