#!/bin/bash

PATH="$PATH":/c/xampp_php7/mysql/bin
mysql -u root --default-character-set=utf8mb4 <<"END"
CREATE DATABASE `dev.wordgame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'dev-wordgame'@'localhost' IDENTIFIED by 'dev-wordgame';
GRANT USAGE ON *.* TO 'dev-wordgame'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `dev.wordgame`.* TO 'dev-wordgame'@'localhost';
connect `dev.wordgame`
set names 'utf8mb4';
END
