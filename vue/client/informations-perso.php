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

    .edit-section {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .edit-section-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 4px;
      max-width: 400px;
      text-align: center;
    }

    .edit-section-title {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .edit-section-description {
      margin-bottom: 20px;
    }

    .edit-section-input {
      margin-bottom: 10px;
    }
  </style>
  <script>
    form_nom = `<form action="../controlleurs/client_controlleur.php" method="post">
      <input type = "hidden" name = "action" value = "modifierNomCompte" />     
      <input class="edit-section-input" type="text" placeholder="Prénom" name="first_name">
      <input class="edit-section-input" type="text" placeholder="Nom" name="last_name">
      <button type="submit" class="save-button">Enregistrer</button>
          </form>
    `;
    form_email = `<form action="../controlleurs/client_controlleur.php" method="post">
      <input type = "hidden" name = "action" value = "modifierEmailCompte" />     
      <input class="edit-section-input" type="text" placeholder="e-mail" name="email">
      <button type="submit" class="save-button">Enregistrer</button>
          </form>
    `;

    function showEditSection(title, description) {
      var infoSection = document.getElementById("info-section");
      infoSection.style.display = "none";

      var editSection = document.createElement("div");
      editSection.className = "edit-section";
      editSection.innerHTML = `
        <div class="edit-section-content">
          <h2 class="edit-section-title">${title}</h2>
          <a href="#" class="cancel-button">Annuler</a>
          <p class="edit-section-description">${description}</p>
          <div class="input-container">
            ${title === "Nom légal" ? form_nom : ''}
            ${title === "Adresse e-mail" ? form_email : ''}
            ${title === "Numéro de téléphone" ? '<input class="edit-section-input" type="text" placeholder="Saisir votre numéro">' : ''}
            ${title === "Mot de passe" ? '<input class="edit-section-input" type="password" placeholder="Entrer votre mot de passe">' : ''}
          </div>
           </div>`;

      var cancelButton = editSection.querySelector(".cancel-button");
      cancelButton.addEventListener("click", function () {
        editSection.remove();
        infoSection.style.display = "block";
      });

      document.body.appendChild(editSection);
    }
  </script>
</head>

<body>
  <?php
  // include '../vue/header_menu.php';
  ?>
  <div class="container">
    <h1>Informations personnelles</h1>

    <div class="section" id="info-section">
      <div class="label">
        <span class="info">Nom légal:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Nom légal', 'C\'est le nom qui figure sur votre document de voyage, à savoir votre permis ou votre passeport, par exemple.')">Modifier</a>
      </div>
      <div class="info">
        <?php echo $compte['first_name'] . ' ' . $compte['last_name'] ?>
      </div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Adresse e-mail:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Adresse e-mail', 'Utilisez une adresse à laquelle vous aurez toujours accès.')">Modifier</a>
      </div>
      <div class="info">
        <?php echo $compte['mail'] ?>
      </div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Numéro de téléphone:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Numéro de téléphone', 'Ajoutez un numéro pour que les voyageurs confirmés et Airbnb puissent vous joindre. Vous pouvez ajouter d\'autres numéros et choisir leur usage.')">Modifier</a>
      </div>
      <div class="info"></div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Mot de passe:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Mot de passe', 'Vous pouvez modifier votre mot de passe.')">Modifier le mot de
          passe</a>
      </div>
    </div>
  </div>
</body>

</html>