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
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet" rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="../js/visit-thanks.js" defer></script>
</head>

<body>
    <section class="visit-thanks-container">
        <article class="thanks">
            <h1>GRACIAS!!! 🧡</h1>
            <p> <?php echo $row['name'] ?> <span> espera tu visita</span></p>
            <img src="../bd_img/<?php echo $row['photo'] ?>" alt="mascota posando">
        </article>
        <span class="tools-visit__indication">Ahora, puedes hacer lo siguiente:</span>
        <article class="tools-visit">
            <!-- links de accion: mapa. whatsapp y donation -->
            <a href="<?php echo $row2['url_whatsapp_group'] ?>"> <button class="tools-visit__btn"> <img src="../img/whatsapp.svg" alt="">Unirse al grupo</button></a>
            <a href="<?php echo $row2['url_address'] ?>">
                <button class="tools-visit__btn"> <img src="../img/google maps.svg" alt="">Ver la dirección</button>
            </a>
            <a href="#">
                <button class="tools-visit__btn"> <img src="../img/qr-code-icon.svg" alt="">Donar por QR</button>
            </a>

        </article>

        <article class="results__cta">
            <span id="thanks-btn-phrase">La mejor forma de ayudarnos</span>
            <button>Compartir en tus redes</button>
            <button class="results__cta--secondary" id="visitThanksHome">Volver al inicio</button>
        </article>

    </section>
</body>

</html>