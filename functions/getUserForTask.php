<?php
	//Récupération des noms des users associés à la liste
		function getUserForTask($listId, $conn) {
			$getUserForTask = 'SELECT DISTINCT t1.firstName, t1.lastName FROM users t1 INNER JOIN users_toDoLists t2 ON t1.id = t2.user_id WHERE t2.toDoList_id='.$listId;
			$qGetUserForTask = $conn->query($getUserForTask);
			$qGetUserForTask->setFetchMode(PDO::FETCH_ASSOC);
			$rowUserForTask = $qGetUserForTask->fetch();
			$userForTask = $rowUserForTask['firstName'].' '.$rowUserForTask['lastName'];
			return $userForTask;
		}