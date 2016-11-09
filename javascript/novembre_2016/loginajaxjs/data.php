<?php 
	$dataBase = [
		  [
      	"id"=>"0",
        "prenom"=>"Rene",
        "nom"=>"Dupont",
      	"mail"=>"lol@gmail.com",
      	"password"=>"mdr"
  		],
  		[
      	"id"=>"1",
        "prenom"=>"Alain",
        "nom"=>"Richard",
      	"mail"=>"toto@gmail.com",
      	"password"=>"toto69"
  		],
  		[
      	"id"=>"2",
        "prenom"=>"Robert",
        "nom"=>"Bara",
      	"mail"=>"titi@gmail.com",
      	"password"=>"titi69"
  		],
  		[
      	"id"=>"3",
        "prenom"=>"James",
        "nom"=>"Levi",
      	"mail"=>"vaulx@gmail.com",
      	"password"=>"vaulx69120"
  		]
	];

	echo json_encode($dataBase);
 ?>