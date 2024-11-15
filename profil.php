<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <?php require_once('components/popup.php') ?>
  <?php require_once('components/modify.php') ?>
  <title>Profil</title>
</head>

<body>
  <?php require_once('components/header.php') ?>
  <main class="d-flex flex-column px-4 px-sm-5">
    <div class="mt-5">
      <h1>Profil</h1>
      <h2 class="mt-3 option">Nom d'utilisateur</h2>
      <div class="d-flex">
        <input type="text" placeholder="Gertrude" disabled class="me-2 flex-fill" id="username-input">
        <button type="button" class="p-2" onclick="enableInput('username-input')">Modifier</button>
      </div>

      <h2 class="mt-3 option">Date de naissance</h2>
      <div class="d-flex">
        <input type="date" value="2024-01-23" disabled class="me-2 flex-fill" id="birthday-input">
        <button type="button" class="p-2" onclick="enableInput('birthday-input')">Modifier</button>
      </div>

      <div class="d-flex">
        <button type="button" class="p-2 mt-4">Appliquer les changements</button>
      </div>

    </div>  

    <div class="d-flex flex-column mt-4">
      <h1 class="text-danger">Zone de danger</h1>
      <div class="container">
        <button type="button" class="btn mt-2 p-2" onclick="openPopup('popup-password')">Modifier le mot de passe</button>
        <div class="popup" id="popup-password">
          <h2>Modification</h2>
          <label for="old">Ancien mot de passe</label>
          <input type="text" name="old" id="old">

          <label for="new">Nouveau mot de passe</label>
          <input type="text" name="new" id="new">
          <button type="button" onclick="closePopup('popup-password')">MODIFIER</button>
        </div>
      </div>

      <div class="container">
        <button type="button" class="btn mt-2 p-2" onclick="openPopup('popup-score')">Reset des scores</button>
        <div class="popup" id="popup-score">
          <h2>Êtes-vous sûr ?</h2>
          <p>Vos scores seront remis à zéro</p>
          <button type="button" onclick="closePopup('popup-score')">RESET</button>
        </div>
      </div>

      <div class="container">
        <button type="button" class="btn mt-2 p-2" onclick="openPopup('popup-account')">Supprimer le compte</button>
        <div class="popup" id="popup-account">
          <h2>Êtes-vous sûr ?</h2>
          <p>Votre compte sera supprimé si vous décidez de continuer</p>
          <button type="button" onclick="closePopup('popup-account')">SUPPRIMER</button>
        </div>
      </div>
    </div>
  </main>
  <?php require_once('components/footer.php') ?>

  <script>
    function openPopup(id) {
      let popup = document.getElementById(id);
      popup.classList.add('open-popup');
    }

    function closePopup(id) {
      let popup = document.getElementById(id);
      popup.classList.remove('open-popup');
    }
  </script>
</body>

<?php require_once('components/script.php') ?>

</html>