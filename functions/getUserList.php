<?php
	//Récupération des noms des users associés à la liste
		function getUserList($listId, $conn) {
			$getUserList = 'SELECT t1.firstName, t1.lastName FROM users t1 INNER JOIN users_toDoLists t2 ON t1.id = t2.user_id WHERE t2.toDoList_id='.$listId;
			$qGetUserList = $conn->query($getUserList);
			$qGetUserList->setFetchMode(PDO::FETCH_ASSOC);
			$userList = 'Utilisateurs associés: ';
			while ($rowUserList = $qGetUserList->fetch()):
				$userList .= $rowUserList['firstName'].' '.$rowUserList['lastName'].' ';
			endwhile;
			return $userList;
		}