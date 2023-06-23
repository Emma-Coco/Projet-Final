<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Centre d'assistance</title>
  <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #1B1B1B;
      margin: 0 auto;
      padding: 0;
      max-width: 1440px;
      border-right: 1px solid white;
      border-left: 1px solid white;
      height: 100vh;
      
    }

    #bloc1 {
      padding: 20px;
      text-align: center;
      margin: 0 auto;
      color : white;
      text-transform: uppercase;
    }

    #bloc1 h1 {
      margin: 0;
    }

    #bloc2 {
      padding: 20px;
      margin: 20px auto;
      border-radius: 5px;
      color: white;
      text-align: center;
      text-transform: uppercase;
    }


    form {
      margin-top: 20px;
    }

    textarea {
      display: flex;
      justify-content: flex-start;
      height: 30vh;
      border: 1px solid black;
      width: 50%;
      resize: none;
      margin: 0 auto;

    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    .fatima {
      display: flex;
      margin: 0 auto;
      overflow-wrap: break-word;
      width: 500px;
      color: lightgray;
      font-style: italic;
    }
  </style>
</head>

<body>
<a style="display:flex;
justify-content:center;
margin: 0 auto;
padding: 0 auto;"href="/controlleurs/pub_controlleur.php">
    <svg width="300" height="100" viewBox="0 0 800 300" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M65.1274 113.761H78.7139L85.1226 166.364L95.1714 113.659L110.501 113.761L120.601 166.364L127.01 113.761H140.545L130.752 186H113.116L102.862 131.808L92.5566 186H74.9199L65.1274 113.761ZM164.705 186V113.761H200.132V124.066H179.214V143.036H199.056V153.341H179.214V175.695H200.132V186H164.705ZM246.185 124.066H241.468V146.112H246.185C249.329 146.112 251.517 145.497 252.747 144.267C253.978 143.036 254.593 140.849 254.593 137.704V132.423C254.593 129.279 253.978 127.108 252.747 125.912C251.551 124.682 249.363 124.066 246.185 124.066ZM246.185 113.761C253.465 113.761 259.105 115.248 263.104 118.222C267.103 121.161 269.102 125.314 269.102 130.68V135.91C269.102 139.909 268.231 143.224 266.488 145.856C264.779 148.488 262.318 150.282 259.105 151.239C265.36 152.812 268.487 157.614 268.487 165.646V178.874C268.487 182.189 268.863 184.564 269.615 186H254.696C254.217 184.633 253.978 182.497 253.978 179.591V164.774C253.978 161.698 253.345 159.545 252.081 158.314C250.85 157.05 248.68 156.417 245.57 156.417H241.468V186H226.959V113.761H246.185ZM306.849 124.066H292.032V113.761H336.175V124.066H321.358V186H306.849V124.066ZM361.309 186V113.761H375.819V143.036H390.533V113.761H405.042V186H390.533V153.341H375.819V186H361.309ZM433.407 186V113.761H468.834V124.066H447.916V143.036H467.757V153.341H447.916V175.695H468.834V186H433.407ZM494.635 186V113.761H509.144V186H494.635ZM536.483 186V113.761H557.811L568.014 169.748L578.165 113.761H599.493V186H586.881V127.501L576.166 186H559.811L549.095 127.501V186H536.483ZM627.96 186V113.761H663.388V124.066H642.47V143.036H662.311V153.341H642.47V175.695H663.388V186H627.96ZM709.44 124.066H704.723V146.112H709.44C712.584 146.112 714.772 145.497 716.002 144.267C717.233 143.036 717.848 140.849 717.848 137.704V132.423C717.848 129.279 717.233 127.108 716.002 125.912C714.806 124.682 712.619 124.066 709.44 124.066ZM709.44 113.761C716.72 113.761 722.36 115.248 726.359 118.222C730.358 121.161 732.357 125.314 732.357 130.68V135.91C732.357 139.909 731.486 143.224 729.743 145.856C728.034 148.488 725.573 150.282 722.36 151.239C728.615 152.812 731.742 157.614 731.742 165.646V178.874C731.742 182.189 732.118 184.564 732.87 186H717.951C717.472 184.633 717.233 182.497 717.233 179.591V164.774C717.233 161.698 716.6 159.545 715.336 158.314C714.105 157.05 711.935 156.417 708.825 156.417H704.723V186H690.214V113.761H709.44Z"
          fill="white" />
      </svg>
  </a>
  <div id="bloc1">
    <h1>Assistance</h1>
  </div>

  <div id="bloc2">
    <h2>centre d'aide</h2>
    <p class="fatima">Le service est ouvert 7 jours sur 7, 24 heures sur 24. Libre a vous de nous contacter par mail si le traitement de votre demande est long.</p>

    <form action="/envoyer_message" method="post">
      <textarea name="message"></textarea>
      <br>
      <input type="submit" value="Envoyer">
    </form>
  </div>
</body>

</html>