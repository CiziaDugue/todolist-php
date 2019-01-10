<?php
	//Récupération des noms des users associés à la tâche
		function getUserTask($taskId, $conn) {
			$getUserTask = 'SELECT t1.id, t1.firstName, t1.lastName FROM users t1 INNER JOIN toDoActions t2 ON t1.id = t2.user_id WHERE t2.id='.$taskId;
			$qGetUserTask = $conn->query($getUserTask);
			$qGetUserTask->setFetchMode(PDO::FETCH_ASSOC);
			$userTask = '';
			while ($rowUserTask = $qGetUserTask->fetch()):
				$userTask .= $rowUserTask['firstName'].' '.$rowUserTask['lastName'].'<br>';
			endwhile;
			return $userTask;
		}