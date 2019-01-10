-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 10 Janvier 2019 à 09:24
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `task_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`task_id`, `user_id`, `text`) VALUES
(1, 1, 'Lorem ipsum dolor sit sce nec purus lacinia, elementum orci a, consequat nisl. Curabitur blandit ligula vitae sapien dignissim aliquam.'),
(2, 2, 'Nam pellentesque mattis nunc ac aliquet. Ut maximus ligula quam. In tempor augue eu enim luctus ulestas imperdiet.');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

CREATE TABLE `state` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `state`
--

INSERT INTO `state` (`id`, `label`) VALUES
(1, 'A faire'),
(2, 'En cours'),
(3, 'Achevé'),
(4, 'Archivé'),
(5, 'Annulé');

-- --------------------------------------------------------

--
-- Structure de la table `toDoActions`
--

CREATE TABLE `toDoActions` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `state_id` smallint(5) UNSIGNED NOT NULL,
  `toDoList_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `toDoActions`
--

INSERT INTO `toDoActions` (`id`, `label`, `description`, `state_id`, `toDoList_id`, `user_id`) VALUES
(1, 'task1', 'task1', 1, 1, 1),
(2, 'task2', 'task2', 1, 1, 1),
(3, 'task3', 'task3', 2, 2, 1),
(4, 'task4', 'task4', 3, 2, 2),
(5, 'task5', 'task5', 4, 3, 3),
(6, '123', '123', 1, 3, 1),
(7, 'task8', 'task8', 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `toDoLists`
--

CREATE TABLE `toDoLists` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `toDoLists`
--

INSERT INTO `toDoLists` (`id`, `label`) VALUES
(1, 'todolist1'),
(2, 'todolist2'),
(3, 'todolist3'),
(4, 'todolist4');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `mail`, `password`) VALUES
(1, 'Cerise', 'Andres', 'ceriseandres@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(2, 'Cizia', 'Dugue', 'ciziadugue@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(3, 'User1', 'User1', 'user1@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(4, 'User2', 'User2', 'user2@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(5, 'User3', 'User3', 'user3@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(6, 'aa', 'aa', 'a@a.a', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(8, 'User4', 'User4', 'user4@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(9, 'bb', 'aa', 'b@b.b', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(10, '22', '11', '1@1.1', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(11, 'User5', 'User5', 'user5@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(12, 'User6', 'User6', 'user6@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(13, 'User7', 'User7', 'user7@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(14, 'bb', 'aa', 'a@b.c', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(15, 'cc', 'aa', 'a@c.e', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(16, 'as', 'as', 'as@a.a', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(17, 'cc', 'aa', 'a@p.l', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(18, 'Vacter', 'Anthony', 'anthonyvacter@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(19, 'Mickael', 'Jackson', 'mickaeljackson@yahoo.fr', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(20, '', '', '', '$2y$10$/hWyHWmmRFeu4kWD0z14rOWe9rqXk8paGLi47Blz8aJi4XFJgMJPm'),
(21, 'Bob', 'Leponge', 'bobleponge@yahoo.fr', '$2y$10$/xEo8YVXgC9pTSNDTfaVHubQNTarmOsG1x8tyAlln7wwdCUP/eJ2W');

-- --------------------------------------------------------

--
-- Structure de la table `users_toDoLists`
--

CREATE TABLE `users_toDoLists` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `toDoList_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_toDoLists`
--

INSERT INTO `users_toDoLists` (`user_id`, `toDoList_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD KEY `comments_fk1` (`task_id`),
  ADD KEY `comments_fk2` (`user_id`);

--
-- Index pour la table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `toDoActions`
--
ALTER TABLE `toDoActions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toDoActions_fk1` (`user_id`),
  ADD KEY `toDoActions_fk2` (`state_id`),
  ADD KEY `toDoActions_fk3` (`toDoList_id`);

--
-- Index pour la table `toDoLists`
--
ALTER TABLE `toDoLists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `users_toDoLists`
--
ALTER TABLE `users_toDoLists`
  ADD KEY `users_toDoLists_fk1` (`user_id`),
  ADD KEY `users_toDoLists_fk2` (`toDoList_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `state`
--
ALTER TABLE `state`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `toDoActions`
--
ALTER TABLE `toDoActions`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `toDoLists`
--
ALTER TABLE `toDoLists`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `toDoActions` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

--
-- Contraintes pour la table `toDoActions`
--
ALTER TABLE `toDoActions`
  ADD CONSTRAINT `toDoActions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `toDoActions_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `toDoActions_ibfk_3` FOREIGN KEY (`toDoList_id`) REFERENCES `toDoLists` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

--
-- Contraintes pour la table `users_toDoLists`
--
ALTER TABLE `users_toDoLists`
  ADD CONSTRAINT `users_toDoLists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `users_toDoLists_ibfk_2` FOREIGN KEY (`toDoList_id`) REFERENCES `toDoLists` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
