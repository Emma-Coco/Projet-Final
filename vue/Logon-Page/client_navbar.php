<nav id="navBar" class="navbar-white">
    <img src="../image/logomarque.svg" class="logo" />
    <ul class="nav-links">
        <a href="#" class="register-btn">
            <?php echo $_SESSION['username']; ?>
        </a>
        <li><a href="#" class="active"> Logements populaires</a></li>
        <li><a href="#">Details de reservations</a></li>
        <li><a href="#">Assistance</a></li>
        <li><a href="#">Avis</a></li>
        <a href="../controlleurs/pub_controlleur.php?action=logout" class="register-btn">
            Logout
        </a>
    </ul>

    <i class="fas fa-bars" onclick="togglebtn()"></i>
</nav>