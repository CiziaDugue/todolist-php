/*Création d'une base de données*/
CREATE DATABASE IF NOT EXISTS `todolist`
CHARACTER SET utf8
COLLATE utf8_bin;
USE todolist;

/*Table des utilisateurs*/
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL UNIQUE COLLATE utf8_general_ci,
  `password` varchar(255) NOT NULL,
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_bin;

/*Table des to do lists*/
CREATE TABLE IF NOT EXISTS `toDoLists` (
  `id` smallint(5) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `label` varchar(50) NOT NULL
);

/*Table des statuts des actions*/
CREATE TABLE IF NOT EXISTS `state` (
  `id` smallint(5) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `label` varchar(50) NOT NULL
);

/*Table des actions des todolists*/
CREATE TABLE IF NOT EXISTS `toDoActions` (
  `id` smallint(5) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `description` varchar(50),
  `state_id` smallint(5) unsigned NOT NULL,
  `toDoList_id` smallint(5) unsigned NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  FOREIGN KEY toDoActions_fk1(user_id)
  REFERENCES users(id),
  FOREIGN KEY toDoActions_fk2(state_id)
  REFERENCES state(id),
  FOREIGN KEY toDoActions_fk3(toDoList_id)
  REFERENCES toDoLists(id) ON UPDATE CASCADE ON DELETE CASCADE
);

/*Table d'association utilisateurs + todolists lié
avec foreign key aux tables users et toDoLists*/
CREATE TABLE IF NOT EXISTS `users_toDoLists` (
  `user_id` smallint(5) unsigned NOT NULL,
  `toDoList_id` smallint(5) unsigned NOT NULL,
  FOREIGN KEY users_toDoLists_fk1(user_id)
  REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY users_toDoLists_fk2(toDoList_id)
  REFERENCES toDoLists(id) ON UPDATE CASCADE ON DELETE CASCADE
);

/*Table des commentaires*/
CREATE TABLE IF NOT EXISTS `comments` (
  `task_id` smallint(5) unsigned NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  `text` text NOT NULL,
  FOREIGN KEY comments_fk1(task_id)
  REFERENCES toDoActions(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY comments_fk2(user_id)
  REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
);
