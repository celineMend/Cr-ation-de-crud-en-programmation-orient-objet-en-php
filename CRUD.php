<?php
interface CRUD{
    PUBLIC function addStudents($name,$class,$marks);
    PUBLIC function readStudents();
    PUBLIC function updateStudents($id,$name,$class,$marks);
    PUBLIC function deleteStudents($id);

}
?>