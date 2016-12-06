<?php


$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "294912kbok@";
$DB_name = "simplchatDB";

try
    {
      $connexion = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    } catch (Exception $excp) {
      die('Erreur : '.$excp->getMessage());
    }
?>