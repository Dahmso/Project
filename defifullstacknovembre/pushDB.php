<?php 
	session_start();

	require('config.php');
	if (isset($_GET["mail"]) && isset($_GET["title"]) && isset($_GET["start"]) && isset($_GET["end"])) {
	$mail = $_GET["mail"];
	$title = $_GET['title'];
	$start = $_GET['start'];
	$end = $_GET["end"];

	$requete = $connexion->prepare("INSERT INTO evenement (event_creatormail, event_title, event_start, event_end) VALUES (?,?,?,?) ");
	$requete->execute(array(
		$mail,
		$title,
		$start,
		$end,
		));

	header ("Location:index.html");
	
	} else {


		print_r($connexion->errorInfo());

	}





 ?>