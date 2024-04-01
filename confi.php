<?php
require_once "Student.php";
// definition des constantes pour les infos de la base de données
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','etude_poo');

//connexio de la base de données en utilisant PDO
try {
    $connexion = new PDO ("mysql:host=" .DB_SERVER.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
    echo "reussie <br>";
    $student = new Student($connexion,"céline", "licence" ,15);
    //appel de la methode d'affichage
    $resultats = $student->readStudents();
} catch (PDOException $e) {
    //affichage d'un message d'erreur et arreter le script si la connexion echoue
    die("erreur::impossible de se connecter à la base de donnée" .$e->getMessage());
}



?>