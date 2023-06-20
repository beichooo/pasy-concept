<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $specie = $_POST['specie'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $size = $_POST['size'];
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
    <title>Perfil de mascota</title>
    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet"
        rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="../js/pet-profile-script.js" defer></script>
</head>

<body>
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
    <main class="pet-profile-body">
        <section class="pet-profile">
            <article class="pet-profile__carousel">
                <img src="../bd_img/<?php echo $row['photo'] ?>" alt="carrusel de fotografias de la mascota">
                <h1><?php echo $name ?></h1>
            </article>

            <article class="results__parameters">
                <div>
                <span><?php echo $specie ?></span>
                <span><?php echo $gender ?></span>
                <span><?php echo $size ?></span>
                <span><?php echo $age ?></span>
                </div>
            </article>

            <article class="pet-profile__status-box">
                <div>
                    <img src="../img/health-status__pet-profile.svg" alt="icono de salud">
                    <span><img src="../img/en-tratamiento_health-tag__pet-profile.svg" alt="en tratamiento"></span>
                </div>

                <div>
                    <img src="../img/mood-status__pet-profile.svg" alt="icono de humor">
                    <span><img src="../img/amigable_mood-tag__pet-profile.svg" alt="amigable"></span>
                </div>

                <div>
                    <img src="../img/location-status__pet-profile.svg" alt="icono de casita">
                    <div>
                        <span><?php echo $row['pet_shelter'] ?></span>
                        <span>en <?php echo $row2['address'] ?></span>
                    </div>
                </div>
            </article>
            <form action = "visit-thanks.php" method="POST">
            <!--input -->
            <div class="results__cta">
                <input type="text" name="pet-shelter" value="<?php echo $row['pet_shelter'] ?>">
                <input type="text" name="pet-name" value="<?php echo $row['name'] ?>">
                <button type="submit">Quiero visitarlo</button>
            </div>
            </form>
            <!-- form action = "visit-thanks.php" method-->
        </section>

        <section class="more-info-pet">
            <h2 class="more-info-pet__title">Más información</h2>
            <p>
                <?php echo $row['history'] ?>
            </p>
            <h3 class="more-info-pet__tag"><span><img src="../img/amigable_mood-tag__pet-profile.svg"
                        alt="amigable"></span>
            </h3>
            <p>
                <?php echo $row['description'] ?>
            </p>

            <h3 class="more-info-pet__tag"><span><img src="../img/en-tratamiento_health-tag__pet-profile.svg"
                        alt="en tratamiento"></span></h3>
            <p>
                <?php echo $row['care'] ?>
            </p>
            <div>
                <button class="donate-cta" id="donateToPet">Donar a la mascota</button>
            </div>

        </section>

        <section class="shelter-info">
            <h2><?php echo $row['pet_shelter'] ?></h2>
            <p>
                <?php echo $row2['description'] ?>
            </p>
            <div>
                <button class="donate-cta" id="donateToShelter">Donar al Albergue</button>
            </div>
        </section>
    </main>
</body>

</html>