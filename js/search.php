<?php
if(isset($_POST)){
    $specie = $_POST['pet-species'];
    $gender = $_POST['pet-gender'];
    $age = $_POST['pet-age'];
    $size = $_POST['pet-size'];
    if($gender == "female-pet"){
        $gender = "Hembra";
    } else {
        $gender = "Macho";
    }
    if($specie == "dog-specie"){
        $specie = "Perro";
    } else {
        $specie = "Gato";
    }
    if($size == "small-size"){
        $size = "Pequeño";
    } elseif($size == "middle-size") {
        $size = "Mediano";
    } else {
        $size = "Grande";
    }
    
    }
    require "../conexion.php";
    $sql = "SELECT * FROM mascotas WHERE gender='$gender' AND size='$size' ORDER BY id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos=$query->fetchAll();
    $datos_json = json_encode($datos);
    header('Content-Type: application/json');
    echo $datos_json;
?>
