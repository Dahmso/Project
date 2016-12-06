<?php 
session_start();
  

require('config.php');
  if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $requete = $connexion->prepare('SELECT prenom, mail, password from users WHERE password = :password AND mail = :username ');
  $requete->bindValue(':password', $password, PDO::PARAM_STR);
  $requete->bindValue(':username', $username, PDO::PARAM_STR);
  $requete->execute();
  $data = $requete->fetchObject();

      
  
  if ($data) {
     $_SESSION['name'] = $data->prenom;
     $_SESSION['mail'] = $data->mail;
     $_SESSION['password'] = $data->password;
  } else {
    
    header ( "Location: ".$page.".php?errorlog=true" );
  }
}


 ?>