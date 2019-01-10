<?php
	//Récupération des libellés des états associés aux tâches
	function getTaskLabel($stateId, $conn) {
		$getTaskLabel = 'SELECT label FROM state WHERE id='.$stateId;
		$qGetTaskLabel = $conn->query($getTaskLabel);
		$qGetTaskLabel->setFetchMode(PDO::FETCH_ASSOC);
		$rowTaskLabel = $qGetTaskLabel->fetch();
		return $rowTaskLabel['label'];
	}