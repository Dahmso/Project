<?php 

  
  if (isset($_POST["identifiant"]) && isset($_POST["password"])) {
    $identifiantInput = $_POST["identifiant"];
    $passwordInput = $_POST["password"];
    try
    {
      $connexion = new PDO('mysql:host=localhost; dbname=userdatabase;charset=utf8',
         'root','root');
    } catch (Exception $excp) {
      die('Erreur : '.$excp->getMessage());
    }
    $requete = ("SELECT nom, prenom, mail FROM users WHERE mail = '$identifiantInput' AND password = '$passwordInput'");
    $resultat = $connexion->query($requete);
    $resultat->execute();

    $count = $resultat->rowCount();
      function counting($countfetch){
      if ($countfetch >= 1) {
        echo $countfetch;
      } else {
        echo false;
      }
    }
    counting($count);
   }

