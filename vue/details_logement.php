<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/vue/styleapp.css" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Listing</title>
</head>

<body>

    <div class="container">
        <div class="info">
            <p>
                Plus de 300 logements · 16 janv. - 27 janv.</p>
            <a class="link-info" href="">
                Vous voulez d'autres apprtements du genre?
            </a>
            <br>
            <h1>
                <?php echo $logement['name']; ?>
            </h1>
            <div>
                <div>
                    <span>
                        <?php echo $logement['description']; ?>
                    </span>
                </div>
            </div>
            <br>


            <div class="carouselBody">
                <?php
                $i = 0;
                $half = round(count($logement['urls']) / 2) - 1;
                foreach ($logement['urls'] as $url) {
                    if ($i == 2)
                        echo '<input type="radio" name="position" checked />';
                    else
                        echo '<input type="radio" name="position" />';
                    $i = $i + 1;
                    if ($i > 4)
                        break;
                }

                ?>
                <main id="carousel">

                    <?php
                    $i = 0;
                    foreach ($logement['urls'] as $url) {
                        echo '<div class="item"> <img src="/vue/Images/Appartements_images/' . $url . '" alt="imageapp"></div>';
                        $i = $i + 1;
                        if ($i > 4)
                            break;
                    }
                    ?>
                    <main>
            </div>

            <br>
            <div>
                <h1>
                    Type Logement :
                    <?php echo $logement['type']; ?>
                </h1>
                <p>
                    <?php echo $logement['number_of_travelers']; ?> voyageurs -
                    <?php echo $logement['kitchen']; ?> Cuisines -
                    <?php echo $logement['bedroom_number']; ?> Lits -
                    <?php echo $logement['bathroom_number']; ?> Salles de bain
                </p>
            </div>
            <br>
            <div>
                <h1>
                    Ce que propose ce logement
                </h1>
                <p>

                    <?php
                    if ($logement['services'] != NULL)
                        foreach ($logement['services'] as $service)
                            echo $service . ' - ';
                    ?>
                </p>
                <figure>
                    <img src="" alt="pdp">
                </figure>
            </div>
            <div class="container-card">
                <div class="overall-card">
                    <div class="reservation-card">
                        <div class="detail-card">
                            <span>
                                <?php echo $logement['price']; ?>&nbsp;€&nbsp;
                            </span>
                            <span>par nuit</span>
                            <p>
                                <span>5.0 - 4 Commentaires</span>
                            </p>
                            <button>Reserver</button>
                            <p>Aucun montant ne vous sera debite pour le moment</p>

                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div>
                <h1>Espace Commentaires</h1>
                <br>
                <p>4 commentaires</p>
                <br>
                <br>
                <div>
                    <figure>
                        <img src="" alt="pdp">
                    </figure>
                    <div>
                        <h1>Marie</h1>
                        <p>Janvier 2021</p>
                        <p>Appartement très bien situé, très propre et très bien équipé. Nous avons passé un excellent
                            séjour. Je recommande vivement.</p>
                    </div>
                </div>
                <br>
                <div>
                    <h1>Ou se situe le logement</h1>
                    <br>
                    <figure>
                        <img src="" alt="carte paris" width="1024">
                    </figure>
                    <span>
                        <?php echo $logement['adress']; ?>
                    </span>
                    <br>
                    <p>En savoir plus</p>
                </div>
            </div>


            <footer>
                <div class="backToTop">
                    <a href="#">Haut de page</a>
                </div>

                <div class="socialMedia">
                    <a href="https://github.com/Lawniet/Airbnb" target="_blank">
                        <i class="fab fa-github fa-2x socialMedia__icon"></i>
                    </a>

                    <a href="https://www.linkedin.com/in/lauany-reis-da-silva/" target="_blank">
                        <i class="fab fa-linkedin-in fa-2x socialMedia__icon"></i>
                    </a>
                </div>

                <p>© Fill</p>
            </footer>
</body>

</html>