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
    <title>Programación de visita</title>
    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet"
        rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="../js/visit-date-script.js" defer></script>
</head>

<body>
    <!-- <header>
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
    </header> -->

    <main>
        <section class="visit-info-container">
            <article class="visit-info-title">
                <h1>Programación de visita</h1>
                <p class=""><?php echo $row['name']; ?> te espera los días...</p>
                <img src="../bd_img/<?php echo $row['photo'] ?>" alt="mascota a ser visitada">
            </article>
            <article class="available-dates">
                <div class="available-dates__week">

                    <img src="../img/days-free__visit-date.svg" alt="dias disponibles">
                </div>
                <div class="available-dates__clock">
                    <img src="../img/free-clock__visit-date.svg" alt="clock icon">
                </div>
            </article>

            <article class="shelter-location">
                <div class="shelter-location__address">
                    <img src="../img/gps-icon__visit-date.svg" alt="gps icon">
                    <div>
                        <p>En: <?php echo $pet_shelter;?></p>
                        <p>
                            <?php echo $row2['address'] ?>
                        </p>
                    </div>
                </div>
                <p class="shelter-location__promo">Para tu visita tendrás:</p>
                <div class="shelter-location__links">
                    <div id="googleMapsBtn">
                        <img src="../img/google maps.svg" alt="google maps icon">
                        <span>Ubicación en Google Maps</span>
                    </div>
                    <div id="whatsAppBtn">
                        <img src="../img/whatsapp.svg">
                        <span>Un grupo de WhatsApp</span>
                    </div>
                </div>
            </article>
        </section>

        <section class="go-visit">
            <!-- <p>Quiero visitarlo el día</p>
            <div class="go-visit__date">
                <img src="../img/walking-visit__visit-date.svg" alt="person icon">
                <p>13 - 14 de septiembre</p>
            </div>
            <div class="go-visit__btns">
                <button>esta semana</button>
                <button>la siguiente</button>
            </div> -->
            <form action="visit-thanks.php" method="POST">
                <!--input -->
                <div class="results__cta">
                    <input class="pet-profile__input" name="pet-shelter" value="<?php echo $row['pet_shelter'] ?>">
                    <input class="pet-profile__input" type="text" name="pet-name" value="<?php echo $row['name'] ?>">
                    <button type="submit" id="confirmVisit">Confirmar visita</button>
                </div>
            </form>
        </section>

    </main>

</body>

</html>