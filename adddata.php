<?php
//
require_once "confi.php";
if(isset($_POST['submit'])){
    //recupérationn des données
    $name= $_POST['name'];
    $class= $_POST['class'];
    $marks= $_POST['marks'];
    //verification si les champs ne sont pas vide 
    if ($name !="" && $class  != "" && $marks !=""){
        //appel de la methode
        $student->addStudents($name, $class,$marks);
    }

}




?>