<?php

include_once('../modele/TypeLogements.php');


?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulaire</title>
    <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
    <style>
        * {
            margin-bottom: 20px;
            color: white;
        }
        body {
            font-family: Roboto, sans-serif;
            margin: 20px;
            background-color: #1b1b1b;
        }

        h1 {

            text-align: center;
        }

        form {
            width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="number"] {
            width: 80px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
    </style>
</head>

<body>


    <form enctype="multipart/form-data" action="../controlleurs/CreateAnnouncement.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required placeholder="Entrez le nom"

        <label for="latitude">Latitude :</label>
        <input type="text" id="latitude" name="latitude" required placeholder="Ex: 48.8566">

        <label for="longitude">Longitude :</label>
        <input type="text" id="longitude" name="longitude" required placeholder="Ex: 2.3522">

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required placeholder="Entrez l'adresse">

        <label for="voyageurs">Nombre de voyageurs :</label>
        <input type="number" id="voyageurs" name="voyageurs" required placeholder="Entrez le nombre de voyageurs">

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" required placeholder="Entrez le prix">

        <label for="typeLogement">Type de logement :</label>
        <select name="typeLogement" id="typeLogement">
            <!-- Options here -->
        </select>

        <label for="chambres">Nombre de chambres :</label>
        <input type="number" id="chambres" name="chambres" required placeholder="Entrez le nombre de chambres">

        <label for="cuisine">Cuisine :</label>
        <input type="text" id="cuisine" name="cuisine" required placeholder="Indiquez s'il y a une cuisine">

        <label for="sallesDeBain">Nombre de salles de bain :</label>
        <input type="number" id="sallesDeBain" name="sallesDeBain" required
            placeholder="Entrez le nombre de salles de bain">

        <!-- Ajout des services -->


        <label for="folder">Nom du dossier :</label>
        <input type="text" name="folder" id="folder" required>

        <label for="images">Sélectionner un dossier d'images :</label>
        <input type="file" id="images" name="images" directory="" webkitdirectory="" mozdirectory="" required>

        <label for="directory">Image principale :</label>
        <input type="text" id="directory" name="directory" placeholder="Nom_du_dossier/url_image" required>

</body>

</html>
