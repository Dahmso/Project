<?php 
session_start();

require("config.php");

$requete = $connexion->prepare('SELECT 	event_ID, event_creatormail, event_title, event_end from evenement');
$requete->execute();
$data = $requete->fetchall();
print_r(json_encode($data));
 ?>