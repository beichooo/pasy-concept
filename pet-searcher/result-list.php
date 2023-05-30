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
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de resultados</title>
    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet"
        rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="../js/result-list-script.js" defer> </script>
</head>

<body class="results-list">

    <h1 class="results__title">Lista de resultados</h1>

    <section class="results__parameters">
        <span>para:</span>
        <div>
            <span><?php echo $specie ?></span>
            <span><?php echo $gender ?></span>
            <span><?php echo $size ?></span>
            <span><?php echo $age ?></span>
        </div>
    </section>

    <section class="pet-list" id="resultsContainer">
       
        <article class="pet-list__item">
            <div>
                <img src="../img/pet-thumb__result-list.png" alt="mascota posando">
                <div>
                    <p></p>
                    <span>en Villa Adela</span>
                </div>
            </div>
            <button>Ver más</button>
        </article>
        
        <div class="results__cta">
            <button class="results__cta--secondary">
                Volver a buscar</button>
        </div>
</body>

</html>