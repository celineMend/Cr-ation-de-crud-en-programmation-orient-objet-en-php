<?php
// Inclure le fichier contenant la classe Student
require_once "confi.php";
//verifier si le formulaire a été soumis
if(isset($_POST['submit'])){
    //recuperation des données
    $id = $_GET["id"];//recuparation de l'id de l'etudiantà partir du get 
    $name= $_POST['name'];
    $class = $_POST['class'];
    $marks = $_POST['marks'];

    //appel de la methode update
    $student->updateStudents($id,$name,$class,$marks);

    //rediriger la page vers index
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Déclaration des métadonnées -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title>PHP - MYSQL - CRUD</title>
    <!-- Inclusion du CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Inclusion du JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Section principale de la page -->
    <section>
        <!-- Titre principal -->
        <h1 style="text-align: center;margin: 50px 0;">update</h1>
        <!-- Conteneur principal -->
        <div class="container">
            <?php
                //requete sql pour selectionner les données de l'etudiant à partir de son id 

                $sql="SELECT * FROM student WHERE id = :id";

                //prepareation de la requete
                $stmt=$connexion ->prepare($sql);

                //liaison des valeurs aux parametre
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);


                //execution de la requete
                if($stmt->execute()){
                    //preparation du resultat
                    $student=$stmt->fetch(PDO::FETCH_ASSOC);
                    //recuperation des donnés de l'etudiant
                    $id = $student['id'];
                    $name = $student['name'];
                    $class = $student['class'];
                    $marks = $student['marks'];
                }else{
                    echo"Erreur lors de la recuperation des données";
                }
            ?>


            <!-- Formulaire d'ajout de données avec la méthode POST et l'action "adddata.php" -->
            <form action="update.php?id=<?php echo $id;?>" method="post">
               <!-- Ligne du formulaire avec les champs -->
               <div class="row">
                    <!-- Champ pour le nom de l'étudiant -->
                    <div class="form-group col-lg-4">
                        <label for="">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control"  value="<?php echo $name?>" required>
                    </div>
                    <!-- Champ pour le grade de l'étudiant -->
                    <div class="form-group  col-lg-3">
                        <label for="">Grade</label>
                        <select name="class" id="grade" class="form-control" required>
                            <!-- Option pour sélectionner le grade -->
                            <option value="">Select a Grade</option>
                            <option value="grade6" <?php if($class == "grade6"){ echo "selected";}?> >Grade 6</option>

                            <option value="grade7" <?php if($class == "grade7"){ echo "selected";}?>>Grade 7</option>

                            <option value="grade8"<?php if($class == "grade8"){ echo "selected";}?>>Grade 8</option>

                            <option value="grade9" <?php if($class == "grade9"){ echo "selected";}?>>Grade 9</option>
                            
                            <option value="grade10" <?php if($class == "grade10"){ echo "selected";}?>>Grade 10</option>
                        </select>
                    </div>
                    <!-- Champ pour les notes de l'étudiant -->
                    <div class="form-group col-lg-3">
                        <label for="">Marks</label>
                        <input type="number" name="marks" id="marks" class="form-control" value="<?php echo $marks?>" required>
                    </div>
                    <!-- Bouton de soumission du formulaire -->
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
        </div>
    </section>


</body>

</html>