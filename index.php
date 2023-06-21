<?php
$sessionLifetime = 30; //1800; // 30 minutes in seconds
session_set_cookie_params($sessionLifetime);
header('location:controlleurs/pub_controlleur.php?action=main');
?>