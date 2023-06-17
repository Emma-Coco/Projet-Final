<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Description</title>
  <link rel="stylesheet" href="appartement-style.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>


<nav id="navBar" class="navbar-white">
  <img src="/Appartements_Images/logomarque.svg" class="logo">
  <ul class="nav-links">
    <li><a href="#" class="active"> Popular Places</a></li>
    <li><a href="#">Travel Outside</a> </li>
    <li><a href="#">Online Packages</a> </li>
  </ul>
  <a href="#" class="register-btn">RegisterNow</a>
  <i class="fas fa-bars" onclick="togglebtn()"></i>

</nav>
<div class="house-details">
  <div class="house-title">
    <h1>Wenge House</h1>
    <div class="row">
      <div>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <span>245 Reviews</span>
      </div>
      <div>
        <p>Location: Paris, Ile-de-France, France</p>
      </div>
    </div>
  </div>

  <div class="slider">
    <img src="/Appartements_Images/AdobeStock_100591416.jpeg" alt="img1" class="img__slider active" />
    <img src="/Appartements_Images/AdobeStock_467748395.jpeg" alt="img2" class="img__slider" />
    <img src="/Appartements_Images/AdobeStock_467748372.jpeg" alt="img3" class="img__slider" />
    <img src="/Appartements_Images/AdobeStock_472388856.jpeg" alt="img4" class="img__slider" />
    <img src="/Appartements_Images/AdobeStock_472388966.jpeg" alt="img5" class="img__slider" />
    <div class="suivant">
      <i class="fas fa-chevron-circle-right"></i>
    </div>
    <div class="precedent">
      <i class="fas fa-chevron-circle-left"></i>
    </div>
  </div>




  <div class="small-details">
    <h2>Entire rental unit hosted by Charles</h2>
    <p>2 guest &nbsp; &nbsp; 2 beds &nbsp; &nbsp; 1 bathroom</p>
    <h4> 554€ / day</h4>
  </div>
  <hr class="line">

  <form class="check-form">

    <div>
      <label>Check-in</label>
      <input type="date" placeholder="Add date">
    </div>


    <div>
      <label>Check-out</label>
      <input type="date" placeholder="Add date">
    </div>

    <div>
      <label>Adults:</label> <br>
      <input type="number" min="0" max="5" placeholder="0">
    </div>
    <div>
      <label>Children:</label> <br>
      <input type="number" min="0" max="5" placeholder="0">
    </div>

    <button type="submit">Check Availability</button>

  </form>




  <ul class="details-list">
    <li><i class="fa-sharp fa-solid fa-house"></i>
      Entire Home
      <span>You will have the entire flat for you</span>
    </li>
    <li><i class="fas fa-paint-brush"></i>
      Enhanced Clean
      <span>This host has committed to Wheirthemer cleaning process.</span>
    </li>
    <li><i class="fas fa-map-marker-alt"></i>
      Great Location
      <span>90% Of recent guests gave the location a 5 star rating</span>
    </li>
    <li><i class="fas fa-heart"></i>
      Great Check-in Experience
      <span>100% of recent guests gave the check-in process a 5 star rating </span>
    </li>

  </ul>

  <hr class="line">


  <p class="home-desc">Guests will be allocated on the ground floor according to availability. You get a comfortable Two bedroom apartment has a true city feeling. The price quoted is for two guest, at the guest slot please mark the number of guests to get the exact price for groups. The Guests will be allocated ground floor according to availability. You get the comfortable two bedroom apartment that has a true city feeling</p>
  <hr class="line">

  <div class="map">
    <h3>Location in map</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8726.888177219847!2d2.299557266759769!3d48.86824685430157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1686763098650!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <b>Paris, Ile-de-France, France</b>
  <p>It's like a home away from home.</p>
  <hr class="line">

  <div class="host">
    <img src="/Appartements_Images/AdobeStock_40582551_Preview.jpeg">
    <div>
      <h2>Hosted by Claire</h2>
      <p><span>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half-alt"></i>
        </span>&nbsp; &nbsp; 245 reviews &nbsp; &nbsp; Response rate 100% &nbsp; &nbsp; Response time: 60 min</p>
    </div>
  </div>
  <a href="#" class="contact-host">Contact Host</a>
</div>






<div class="footer">
  <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
  <a href="https://youtube.com"><i class="fab fa-youtube"></i></a>
  <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
  <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
  <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
  <hr>
  <p>Copyright 2023.</p>
</div>
</div>







<script>
  let navBar = document.getElementById("navBar");
  function togglebtn(){
    navBar.classList.toggle("hidemenu");
  }
</script>
<script src="description-appart.js"></script>
<script src="https://kit.fontawesome.com/db48a25407.js" crossorigin="anonymous"></script>
</body>
</html>