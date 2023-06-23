<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Locations de vacances, hébergements, expériences et lieux - Werheimer
    </title>
    <link rel="stylesheet" href="/vue/style.css" />

    <link rel="shortcut icon" href="/vue/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <script src="https://kit.fontawesome.com/4b9780a374.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        body {
        background-color: #1b1b1b;
        font-family: Roboto, sans-serif;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 80px;
        }
    </style>

    <div class="container">
        <header id="header">
        
                </div>
                <?php
                include '../vue/client/menu_berger.php';

                if ($reservations == NULL)
                    echo 'pas de reservations a montrer';
                else
                    foreach ($reservations as $reservation) {
                        echo "Reservation code " . $reservation['id_booking'] . " pour logemment " . $reservation['name'] . ' date depart ' . $reservation['starting_date'] . '<br>';
                    }




                ?>