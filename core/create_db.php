<?php
$HOST = "localhost";        // имя сервера
$USER = "root";             // пользователь базы данных MySQL
$PASS = "89911151Nk!";                 // пароль для доступа к серверу MySQL
$DB = "site_profiles";               // название создаваемой базы данных

$connect = mysqli_connect("$HOST", "$USER", "$PASS");
if(!$connect) exit(mysqli_error());
else {echo "";}
mysqli_query($connect, "GRANT ALL PRIVILEGES ON test_db.* TO root@localhost IDENTIFIED BY '89911151Nk!';");

$create = mysqli_query($connect, "CREATE DATABASE $DB");
if(!$create)exit(mysqli_error($connect));



if (!mysqli_select_db($connect, $DB)) exit(mysqli_error($connect));
else{echo "";}

mysqli_query($connect, 'SET NAMES utf8mb4;');
mysqli_query($connect, 'SET character_set_client = utf8mb4;');
mysqli_query($connect, 'CREATE TABLE `profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contacts` varchar(50) DEFAULT NULL,
  `education` text,
  `experience` text,
  `skills` text,
  `name` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;');
mysqli_query($connect, 'CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50),
  `password` varchar(100),
  `name` varchar(50),
  `rank` tinyint(2),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;');
mysqli_query($connect, 'INSERT INTO `test_table` VALUES (1,\'test_text\');');
echo "База данных успешно создана. \n";