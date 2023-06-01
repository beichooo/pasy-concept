<?php
if (isset($_POST)) {
    $specie = $_POST['pet-species'];
    $gender = $_POST['pet-gender'];
    $age = $_POST['pet-age'];
    $size = $_POST['pet-size'];
    if ($gender == "female-pet") {
        $gender = "Hembra";
    } else {
        $gender = "Macho";
    }
    if ($specie == "dog-specie") {
        $specie = "Perro";
    } else {
        $specie = "Gato";
    }
    if ($size == "small-size") {
        $size = "Pequeño";
    } elseif ($size == "middle-size") {
        $size = "Mediano";
    } else {
        $size = "Grande";
    }

    if ($age == "1-2-year") {
        $age = "1 a 2 años";
    } elseif ($age == "less-1-year") {
        $age = "Menos de 1 año";
    } elseif ($age == "3-4-year") {
        $age = "3 a 4 años";
    } else {
        $age = "5 años o más";
    }
}
require "../conexion.php";
$sql = "SELECT * FROM mascotas WHERE gender='$gender' AND size='$size' ORDER BY id DESC";
$query = $pdo->prepare($sql);
$query->execute();

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
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet" rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="../js/result-list-script.js" defer> </script>
</head>

<body >
    <header>
        <nav class="nav-bar">
            <span class="nav-bar__logo">PASY</span>
            <div class="nav-bar__btns">
                <button class="nav-bar__donate-btn">
                    Donar
                    <img src="../img\green-heart__nav-bar-icon.svg" alt="green heart" />
                </button>
                <img class="nav-bar__menu-icon" src="../img\burguer-menu__nav-bar-icon.svg" alt="burguer menu icon" />
            </div>
        </nav>
    </header>

    <main class="results-list">

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
        <?php
        // Mostrar los resultados
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo    '<article class="pet-list__item">';
                echo        '<div>';
                echo            '<img class="pet-thumbnail" src="../bd_img/'.$row['photo'].'" alt="mascota posando">';
                echo                '<div>';
                echo                '<p>'. $row['name'].'</p>';
                echo                '<span>'.$row['address'].'</span>';
                echo                '</div>';
                echo        '</div>';
                echo        '<button>Ver más</button>';
                echo    '</article>';
            }
        } else {
            echo 'No se encontraron resultados.';
        }
        
        // Cerrar la conexión a la base de datos
        $pdo = null;
        ?>

            <div class="results__cta">
            <button class="results__cta--secondary">
                Volver a buscar</button>
            </div>
        </main>
        </body>
        
        </html>