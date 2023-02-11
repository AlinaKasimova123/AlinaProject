<?php
require_once('../db//DBConnection.php');
try {

    if($_POST['userName'] == "" && $_POST['surname'] == "" && $_POST['age'] == "") {
        exit;
    }
        $name = htmlspecialchars($_POST['userName']);
        $surname = htmlspecialchars($_POST['surname']);
        $age = htmlspecialchars($_POST['age']);
        $stmt = DBConnClass::run()->prepare("INSERT INTO form_data (name, surname, age) VALUES (:name, :surname, :age)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":age", $age);
        $stmt->execute();
}
catch(Exception $exc){
    echo 'Выброшено исключение: ',  $exc->getMessage(), "\n";
}