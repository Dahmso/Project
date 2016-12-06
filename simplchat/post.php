<?php 
session_start();

if (isset($_SESSION['name'])) {
	$usertext = $_POST['text'];
    $openLog = fopen("chatlog.html", 'a'); // a = write only;
    fwrite($openLog, "<div class='msgIn'>".$_SESSION['name']." ".": ".$usertext."</div>"); //ecrit dans un fichier fwrite(fichier, contenu, length optionnel)
    fclose($openLog);
}


 ?>