<?php
if (isset($_POST)) {
    $name = $_POST['pet-name'];
    $pet_shelter = $_POST['pet-shelter'];
}
require "../conexion.php";
$sql = "SELECT *
FROM mascotas
WHERE name = '$name' 
ORDER BY id DESC;";
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$address = $row['pet_shelter'];
$sql2 = "SELECT *
FROM pet_shelter
WHERE name_petShelter = '$address' 
ORDER BY id DESC;";
$query = $pdo->prepare($sql2);
$query->execute();
$row2 = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por confirmar tu visita</title>
    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet"
        rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="../js/visit-thanks.js" defer></script>
</head>

<body>
    <section class="visit-thanks-container">
        <article class="thanks">
            <h1>GRACIAS!!!</h1>
            <p> <?php echo $row['name'] ?> <span> <br>te espera</span></p>
            <img src="../bd_img/<?php echo $row['photo'] ?>" alt="mascota posando">
        </article>

        <article class="doubts-thanks">
            <span>¿Tienes alguna duda?</span>
            <div>
                <button>Dirección</button>
                <button>WhatsApp</button>
            </div>
            <button>Preguntas frecuentes</button>
        </article>

        <article class="results__cta">
            <span id="thanks-btn-phrase">Otras formas de ayudarnos</span>
            <button>Compartir en tus redes</button>
            <button class="results__cta--secondary">Hacer una donación</button>
            <button class="results__cta--secondary" id="visitThanksHome">Volver al inicio</button>
        </article>

    </section>
</body>

</html>