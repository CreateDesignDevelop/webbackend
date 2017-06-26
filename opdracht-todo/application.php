<?php
	$message 			= '';
	$toDoArray 			= array();
	$doneArray 			= array();

	session_start();

	if ( isset($_POST['btnAddToDo']) ) {
		if ( isset($_POST['description']) ) {
			if ($_POST['description'] != '') {
				$_SESSION['toDoArray'][] = $_POST['description'];
			}
		}
	}

	if ($_SESSION['toDoArray'] || $_SESSION['doneArray']) {
		if ( isset($_GET['done']) ) {
			$_SESSION['doneArray'][] = $_SESSION['toDoArray'][ $_GET['done'] ];
			unset($_SESSION['toDoArray'][ $_GET['done'] ]);
		}
		if ( isset($_GET['delete']) ) {
			unset( $_SESSION['toDoArray'][$_GET['delete']] );
		}

		if ( isset($_GET['undoDone']) ) {
			$_SESSION['toDoArray'][] = $_SESSION['doneArray'][ $_GET['undoDone'] ];
			unset($_SESSION['doneArray'][ $_GET['undoDone'] ]);
		}
		if ( isset($_GET['deleteDone']) ) {
			unset($_SESSION['doneArray'][ $_GET['deleteDone'] ]);
		}
	}

	if ($_SESSION['toDoArray']) {
		$message = "Dit zijn je ToDo's voor vandaag";
	} else {
		$message = "Joepie, je hebt geen ToDo's meer voor vandaag";
	}

	if (isset($_SESSION['toDoArray'])) {
		$toDoArray = $_SESSION['toDoArray'];

	}
	if (isset($_SESSION['doneArray'])) {
		$doneArray = $_SESSION['doneArray'];	
	}
	
	require_once 'applicationView.php';
?>