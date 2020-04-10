#!/bin/bash

PATH="$PATH":/c/xampp_php7/mysql/bin
mysql -u root --default-character-set=utf8mb4 <<"END"
DROP DATABASE `dev.wordgame`;
DROP USER 'dev-wordgame'@'localhost';
END
