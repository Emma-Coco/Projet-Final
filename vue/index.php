<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Locations de vacances, hébergements, expériences et lieux - Werheimer
  </title>
  <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <script src="https://kit.fontawesome.com/4b9780a374.js" crossorigin="anonymous"></script>
</head>

<style>

  * {
    margin: 0;
    padding: 0;
    outline: 0;
    box-sizing: border-box;
    color: #222222;

    font-family: 'Roboto', sans-serif;
  }

  html {
    scroll-behavior: smooth;
  }

  body {
    height: 100%;
    font-size: 14px;
    background-color: white;
  }

  a {
    text-decoration: none;
  }

  ul {
    list-style: none;
  }

  li {
    list-style: none;
  }

  h1,
  h2,
  h3,
  h4 {
    margin: 0;
    padding: 0;
  }

  input {
    border: 0;
  }

  button {
    border: 0;
    background: none;
    cursor: pointer;
  }

  @keyframes HeaderFromTop {
    0% {
      transform: translateY(-300px);
      opacity: 0;
    }

    50% {
      transform: translateY(15px);
      opacity: 1;
    }

    60% {
      transform: translateY(-10px);
      opacity: 1;
    }

    70% {
      transform: translateY(5px);
      opacity: 1;
    }

    80% {
      transform: translateY(-5px);
      opacity: 1;
    }

    100% {
      transform: translateY(0px);
      opacity: 1;
    }
  }

  @keyframes FromLeft {
    0% {
      transform: translateX(-300px);
      opacity: 0;
    }

    100% {
      transform: translateX(0px);
      opacity: 1;
    }
  }

  @keyframes Logo {
    0% {
      transform: scale(0.5);
    }

    100% {
      transform: scale(normal);
    }
  }

  @keyframes BackgroundButton {
    0% {
      transform: scale(0.5);
    }

    100% {
      transform: scale(normal);
    }
  }

  .container {
    max-width: 100%;
    margin: 0 auto;
    padding: 0;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;

    width: 100%;
    max-width: 100%;
    margin: 0 auto;

    height: 70px;

    padding: 0px;

    border-bottom: 1px solid black;



    background-color: #ffffff;

    z-index: 9;

    position: fixed;
    top: 0;
  }

  #openModalBtn {
    background-color: white;
    /* Green */
    color: black;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    font-weight: 300;
    display: inline-block;
    font-size: 15px;
    text-transform: uppercase;
    margin: 24px;
  }

  #openModalBtn:hover {
    border: 1px solid black;
    cursor: pointer;
  }

  form {
    display: flex;
    align-items: center;
    flex-direction: column;

  }


  .login-form {
    border: 1px solid black;

  }

  .go-login {
    background-color: white;
    /* Green */
    border: 1px solid black;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 20px;
  }

  :hover.go-login {
    background-color: black;
    color: white;
    cursor: pointer;
  }


  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 300px;
  }

  .modal-content input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
  }

  .modal-content form {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .mdp-oublie {
    font-style: italic;
    color: #aaa;

  }

  .mdp-oublie:hover,
  .mdp-oublie:focus {
    color: #888;
    cursor: pointer;
  }

  .inscription {
    padding: 20px;
    text-decoration: none;
  }


  .inscription:hover,
  .inscription:focus {
    color: black;
    text-decoration: underline;
    cursor: pointer;
  }


  @import url(https://fonts.googleapis.com/css?family=Roboto:500);

  .google-btn {
    width: 184px;
    height: 42px;
    background-color: white;
    box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
  }

  .google-btn .google-icon-wrapper {
    position: absolute;
    margin-top: 1px;
    margin-left: 1px;
    width: 40px;
    height: 40px;
    background-color: #fff;
  }

  .google-btn .google-icon {
    position: absolute;
    margin-top: 11px;
    margin-left: 11px;
    width: 18px;
    height: 18px;
  }

  .google-btn .btn-text {
    float: right;
    margin: 11px 11px 0 0;
    color: #fff;
    font-size: 14px;
    letter-spacing: 0.2px;
    font-family: "Roboto";
  }

  .google-btn:hover {
    box-shadow: 0 0 6px #052781;
  }

  .google-btn:active {
    background: #052781;
  }

  /* HEADER - INFO */
  .header__info {
    display: flex;
    justify-content: space-between;
    align-items: center;

    height: 48px;

    margin: 0 24px;


    border: 1px solid black;

    font-weight: bold;

    transition: all 0.2s ease-in-out;
    cursor: pointer;
  }

  .header__info:hover {
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.12);
  }

  @media only screen and (max-width: 800px) {
    .header__info {
      display: none;
    }
  }

  .header__info>div {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 5px 16px;
    height: 100%;

    min-width: 0px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .header__info>div:last-child {
    border-left: 1px solid black;
  }

  .header__info--place {}

  .header__info--date {}

  .header__info--input {}

  .header__info--input::placeholder {
    font-size: 12px;
  }

  .header__info--button {}

  .header__info--button>button>i {
    color: black;
  }

  .link-info {
    color: #052781;
  }

  /* HEADER - PROFILE */
  .header__profile {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 5px 5px 16px;


    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.18);

    cursor: pointer;
    transition: all 0.2s ease-in-out;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);

  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50vw;
    height: 50vh;
  }

  .modal-content h2 {
    text-align: center;
    padding: 20px;
    text-transform: uppercase;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;

  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;

  }



  .header__profile:hover {
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.12);
  }

  .header__profile--name {
    margin-right: 10px;
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .header__profile--image {
    width: 30px;

  }

  .info {
    display: flex;
    flex-direction: column;
    margin-top: 34px;
    padding: 0 24px;


  }

  .info>p {
    margin-bottom: 16px;
  }

  .info>h1 {
    font-size: 2em;
    margin-bottom: 16px;
  }

  .info__orders {
    display: flex;
  }

  @media only screen and (max-width: 600px) {
    .info__orders {
      flex-direction: column;
    }
  }

  @media only screen and (max-width: 600px) {
    .info__orders--button {
      margin-bottom: 8px;
    }
  }

  #cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 32px;
    margin-top: 62px;
    padding: 0px;
    grid-column-gap: 80px;
    grid-row-gap: 80px;
  }


  @media only screen and (max-width: 800px) {
    #cards {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media only screen and (max-width: 425px) {
    #cards {
      grid-template-columns: repeat(1, 1fr);
    }
  }

  .card__item {
    max-width: 100vh;
    margin-bottom: 0;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.12);
    transition: all 0.2s ease-in-out;
    min-height: 600px;
    max-height: 600px;
  }

  .card__item:hover {
    transform: translateY(-10px);
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
  }

  .card__item--image {
    width: 100%;
    min-height: 400px;
    max-height: 400px;
    object-fit: cover;
  }

  .card__description {
    padding: 8px 16px;
    min-height: 40px;
    max-height: 40px;
    overflow-wrap: break-word;
    overflow: hidden;
  }

  .card__description--type {
    width: max-content;
    margin-bottom: 12px;
    background: black;
    padding: 8px 16px;
    color: white;
  }

  .card__description--name {
    margin-bottom: 12px;
    font-size: 18px;
    padding: 8px;
  }

  .card__description--price {
    margin-bottom: 12px;
    padding: 16px;
    disdpay: flex;
  }

  footer {
    margin-top: 64px;
    padding: 32px 24px;
    border-top: 1px solid rgba(0, 0, 0, 0.18);

    text-align: center;
  }

  .backToTop,
  .socialMedia {
    margin-bottom: 32px;
  }

  .socialMedia {}

  .socialMedia__icon {
    margin-right: 8px;
    cursor: pointer;
    transition: background 0.2s ease-in-out;
  }

  .socialMedia__icon:hover {
    color: #052781;
  }

  .video__container {
    position: static;
    top: 0;
    left: 0;
    width: 100%;
    height: 100;
    z-index: -1;
    overflow: hidden;
    /* Ensures video doesn't overflow the container */
  }

  #loop__vid {
    width: 100vw;
    height: 100vh;
    position: static;
    top: 0;
    object-fit: cover;
    z-index: -1;
  }

  svg {
    padding: 0px;
    margin: 0px;
  }
</style>

<body>

  <header id="header">
    <a href="../controlleurs/pub_controlleur.php">
      <svg width="180" height="60" viewBox="0 0 800 300" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M65.1274 113.761H78.7139L85.1226 166.364L95.1714 113.659L110.501 113.761L120.601 166.364L127.01 113.761H140.545L130.752 186H113.116L102.862 131.808L92.5566 186H74.9199L65.1274 113.761ZM164.705 186V113.761H200.132V124.066H179.214V143.036H199.056V153.341H179.214V175.695H200.132V186H164.705ZM246.185 124.066H241.468V146.112H246.185C249.329 146.112 251.517 145.497 252.747 144.267C253.978 143.036 254.593 140.849 254.593 137.704V132.423C254.593 129.279 253.978 127.108 252.747 125.912C251.551 124.682 249.363 124.066 246.185 124.066ZM246.185 113.761C253.465 113.761 259.105 115.248 263.104 118.222C267.103 121.161 269.102 125.314 269.102 130.68V135.91C269.102 139.909 268.231 143.224 266.488 145.856C264.779 148.488 262.318 150.282 259.105 151.239C265.36 152.812 268.487 157.614 268.487 165.646V178.874C268.487 182.189 268.863 184.564 269.615 186H254.696C254.217 184.633 253.978 182.497 253.978 179.591V164.774C253.978 161.698 253.345 159.545 252.081 158.314C250.85 157.05 248.68 156.417 245.57 156.417H241.468V186H226.959V113.761H246.185ZM306.849 124.066H292.032V113.761H336.175V124.066H321.358V186H306.849V124.066ZM361.309 186V113.761H375.819V143.036H390.533V113.761H405.042V186H390.533V153.341H375.819V186H361.309ZM433.407 186V113.761H468.834V124.066H447.916V143.036H467.757V153.341H447.916V175.695H468.834V186H433.407ZM494.635 186V113.761H509.144V186H494.635ZM536.483 186V113.761H557.811L568.014 169.748L578.165 113.761H599.493V186H586.881V127.501L576.166 186H559.811L549.095 127.501V186H536.483ZM627.96 186V113.761H663.388V124.066H642.47V143.036H662.311V153.341H642.47V175.695H663.388V186H627.96ZM709.44 124.066H704.723V146.112H709.44C712.584 146.112 714.772 145.497 716.002 144.267C717.233 143.036 717.848 140.849 717.848 137.704V132.423C717.848 129.279 717.233 127.108 716.002 125.912C714.806 124.682 712.619 124.066 709.44 124.066ZM709.44 113.761C716.72 113.761 722.36 115.248 726.359 118.222C730.358 121.161 732.357 125.314 732.357 130.68V135.91C732.357 139.909 731.486 143.224 729.743 145.856C728.034 148.488 725.573 150.282 722.36 151.239C728.615 152.812 731.742 157.614 731.742 165.646V178.874C731.742 182.189 732.118 184.564 732.87 186H717.951C717.472 184.633 717.233 182.497 717.233 179.591V164.774C717.233 161.698 716.6 159.545 715.336 158.314C714.105 157.05 711.935 156.417 708.825 156.417H704.723V186H690.214V113.761H709.44Z"
          fill="black" />
      </svg>
    </a>

    <form action="../controlleurs/pub_controlleur.php" method="post">
      <input type="hidden" name="action" value="searchLogements" />
      <div class="header__info">
        <div style="border-right: 1px solid black">
          <select name="destination" class="header__info--input" style="border: none;">
            <option value="">Sélectionnez un arrondissement</option>
            <?php
            $allDestinations = PubModel::getAllDestinations();
            foreach ($allDestinations as $destination) {
              echo '<option value="' . $destination . '">' . $destination . '</option>';
            }
            ?>
          </select>
        </div>
        <div style="border-right: 1px solid black">
          <input style="display:none" type="Date">
          <input type="text" name="depart" class="header__info--input" placeholder="Date de début"
            onfocus="(this.type='Date')" onblur="if(!this.value) this.type='text'" />
        </div>
        <div style="border-right: 1px solid black">
          <input style="display:none" type="Date">
          <input type="text" name="arrive" class="header__info--input" placeholder="Date de fin"
            onfocus="(this.type='Date')" onblur="if(!this.value) this.type='text'" />
        </div>
        <div>
          <input name="places" class="header__info--input" placeholder="Nombre de places" />
        </div>

        <div class="header__info--button">
          <button type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <?php
    if (isset($_SESSION['username']))
      include 'client/menu_berger.php';
    else {
      ?>
      <button id="openModalBtn">Se connecter</button>
    <?php } ?>
    <div id="modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Connexion</h2>
        <form action="../controlleurs/pub_controlleur.php" method="post">
          <input type="hidden" name="action" value="login" />
          <label for="username">Nom d'utilisateur:</label>
          <input class="login-form" type="text" id="username" name="username" />
          <br>
          <br>
          <label for="password">Mot de passe:</label>
          <input class="login-form" type="password" id="password" name="password" />

          <button class="go-login" type="submit">Se connecter</button>
          <a class="mdp-oublie" href="#">Mot de passe oublié?</a>
          <a class="inscription" href="/vue/register.html">S'inscrire</a>
        </form>
      </div>
    </div>
  </header>
  <div class="container">
  <div class="video__container">
  <video id="loop__vid" autoplay="autoplay" muted loop>
    <source src="/vue/loop.mp4" type="video/mp4">
  </video>

    </div>
    <div class="info">
      <br />
      <h1>Logements a Paris</h1>
      <div class="info__orders">
        <h2 style="font-weight:400;">Le logement à nous, pour vous, avec vous.</h2>
      </div>

      <div id="cards">

        <?php
        if ($logements == NULL)
          echo 'Aucun Logement trouve';
        else
          foreach ($logements as $logement) {
            $description = substr($logement['description'], 0, 200);
            ?>
            <a href="../controlleurs/pub_controlleur.php?action=detailsLogement&id_logement=<?php echo $logement['id']; ?>">
              <article class="card__item">
                <img class="card__item--image" src="/vue/Images/Appartements_images/<?php if (file_exists('../vue/Images/Appartements_images/' . $logement['url'])) {
                  echo $logement['url'];
                } else {
                  echo 'defaut.png';
                } ?>" alt="Photo appartement" c />
                <h3 class="card__description--name">
                  <?php echo $logement['name']; ?>
                </h3>
                <p class="card__description">
                  <?php echo $description; ?>
                </p>
                <p class="card__description--price"><strong>
                    <?php echo $logement['price']; ?>€
                  </strong>par nuit</p>
                <p class="card__description--type">
                  <?php echo $logement['type']; ?>
                </p>
              </article>
            </a>
            <?php
          }
        ?>

      </div>
    </div>
    <br>
    <br>
    <br>

    <footer>
        <div class="container__footer">
          <div class="footer__logo">
            <a href="#">
            <svg width="180" height="60" viewBox="0 0 800 300" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M65.1274 113.761H78.7139L85.1226 166.364L95.1714 113.659L110.501 113.761L120.601 166.364L127.01 113.761H140.545L130.752 186H113.116L102.862 131.808L92.5566 186H74.9199L65.1274 113.761ZM164.705 186V113.761H200.132V124.066H179.214V143.036H199.056V153.341H179.214V175.695H200.132V186H164.705ZM246.185 124.066H241.468V146.112H246.185C249.329 146.112 251.517 145.497 252.747 144.267C253.978 143.036 254.593 140.849 254.593 137.704V132.423C254.593 129.279 253.978 127.108 252.747 125.912C251.551 124.682 249.363 124.066 246.185 124.066ZM246.185 113.761C253.465 113.761 259.105 115.248 263.104 118.222C267.103 121.161 269.102 125.314 269.102 130.68V135.91C269.102 139.909 268.231 143.224 266.488 145.856C264.779 148.488 262.318 150.282 259.105 151.239C265.36 152.812 268.487 157.614 268.487 165.646V178.874C268.487 182.189 268.863 184.564 269.615 186H254.696C254.217 184.633 253.978 182.497 253.978 179.591V164.774C253.978 161.698 253.345 159.545 252.081 158.314C250.85 157.05 248.68 156.417 245.57 156.417H241.468V186H226.959V113.761H246.185ZM306.849 124.066H292.032V113.761H336.175V124.066H321.358V186H306.849V124.066ZM361.309 186V113.761H375.819V143.036H390.533V113.761H405.042V186H390.533V153.341H375.819V186H361.309ZM433.407 186V113.761H468.834V124.066H447.916V143.036H467.757V153.341H447.916V175.695H468.834V186H433.407ZM494.635 186V113.761H509.144V186H494.635ZM536.483 186V113.761H557.811L568.014 169.748L578.165 113.761H599.493V186H586.881V127.501L576.166 186H559.811L549.095 127.501V186H536.483ZM627.96 186V113.761H663.388V124.066H642.47V143.036H662.311V153.341H642.47V175.695H663.388V186H627.96ZM709.44 124.066H704.723V146.112H709.44C712.584 146.112 714.772 145.497 716.002 144.267C717.233 143.036 717.848 140.849 717.848 137.704V132.423C717.848 129.279 717.233 127.108 716.002 125.912C714.806 124.682 712.619 124.066 709.44 124.066ZM709.44 113.761C716.72 113.761 722.36 115.248 726.359 118.222C730.358 121.161 732.357 125.314 732.357 130.68V135.91C732.357 139.909 731.486 143.224 729.743 145.856C728.034 148.488 725.573 150.282 722.36 151.239C728.615 152.812 731.742 157.614 731.742 165.646V178.874C731.742 182.189 732.118 184.564 732.87 186H717.951C717.472 184.633 717.233 182.497 717.233 179.591V164.774C717.233 161.698 716.6 159.545 715.336 158.314C714.105 157.05 711.935 156.417 708.825 156.417H704.723V186H690.214V113.761H709.44Z"
                  fill="white" />
              </svg>
            </a>
              
          </div>
        
          <ul class="ul_footer">
            <li class="li__footer"><a class="a__footer" href="https://www.hetic.net/" target="_blank">HETIC</a></li>
            <li class="li__footer"><a class="a__footer" href="https://github.com/Emma-Coco/Projet-Final" target="_blank">Repo</a></li>
            <li class="li__footer"><a class="a__footer" href="https://youtu.be/dQw4w9WgXcQ" target="_blank">Surprise</a></li>
          </ul>
          <p class="disclaimer">All rights reserved, student group HETIC, 2023.</p>
      </div>
    </footer>

    <style>

  footer{
    padding: 0 auto;
    margin: 0 auto;
    background-color: black;
    height: 180px;
    color: white;
    display: flex;
  }

  .container__footer{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    padding: 0 auto;
    color: white;
  }

  .ul_footer{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    list-style: none;
    width: 100%;
    margin: 0 auto;
    padding: 0 auto;
    color: white;
  }

  .a__footer{
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
    text-transform: uppercase;
    font-weight: bold;
    margin: 0 auto;
    padding: 10px;
  }

  :hover.a__footer{
    text-decoration: underline;
  }

  .disclaimer{
    font-size: 0.8rem;
    margin: 0 auto;
    padding: 0 auto;
    color: gray;
  }



    </style>

    <script src="/vue/script.js"></script>
</body>

</html>