/*Création d'une base de données*/
CREATE DATABASE `todolist-php` DEFAULT CHARSET=utf8;

/*Table des utilisateurs*/
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
);

/*Table des to do lists*/
CREATE TABLE IF NOT EXISTS `toDoLists` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

/*Table des actions des todolists*/
CREATE TABLE IF NOT EXISTS `toDoActions` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `description` varchar(50),
  `status_id` smallint(5),
  `user_id` varchar(50),
  PRIMARY KEY (`id`)
);

/*Table d'association utilisateurs + todolists*/
CREATE TABLE IF NOT EXISTS `users_toDoLists` (
  `user_id` smallint(5) NOT NULL,
  `toDoList_id` smallint(5) NOT NULL,
  PRIMARY KEY (`user_id`)
);

/*Table des statuts des actions*/
CREATE TABLE IF NOT EXISTS `status` (
  `id` smallint(5) NOT NULL,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

/*Table des commentaires*/
CREATE TABLE IF NOT EXISTS `comments` (
  `task_id` smallint(5) NOT NULL,
  `user_id` smallint(5) NOT NULL,
  `text` tinytext NOT NULL,
  PRIMARY KEY (`task_id`)
);