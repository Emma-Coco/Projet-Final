<!DOCTYPE html>
<html>

<head>
  <title>Informations personnelles</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    .section {
      margin-bottom: 40px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 20px;
      max-width: 400px;
      position: relative;
    }

    .label {
      font-weight: bold;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .edit-link,
    .add-link {
      color: blue;
      text-decoration: underline;
      white-space: nowrap;
    }

    .add-link::after {
      content: " Ajouter";
    }

    .add-link:hover,
    .edit-link:hover {
      color: blue;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Informations personnelles</h1>

    <div class="section">
      <div class="label">
        <span class="info">Nom légal:</span>
        <a href="#" class="edit-link">Modifier</a>
      </div>
      <div class="info">Berol Djomo</div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Adresse e-mail:</span>
        <a href="#" class="edit-link">Modifier</a>
      </div>
      <div class="info">b***o@gmail.com</div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Numéro de téléphone:</span>
        <a href="#" class="edit-link">Modifier</a>
      </div>

      <div class="info"></div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Pièce d'identité officielle:</span>
        <a href="#" class="add-link"></a>
      </div>
      <div class="info">Information non fournie</div>
    </div>
    <div class="section">
      <div class="label">
        <span class="info">Mot de passe:</span>
        <a href="#" class="edit-link">Modifier le mot passe</a>
      </div>
    </div>
</body>

</html>