<?php
require_once "confi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = new Student($connexion, $name, $class, $marks);
    $student->deleteStudents($id);
    header("Location: index.php");
    exit();
} else {
    echo "Identifiant d'étudiant non spécifié.";
}
?>
