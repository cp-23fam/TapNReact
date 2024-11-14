<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Profil</title>
</head>

<body>
  <?php require_once('components/header.php') ?>
  <main class="d-flex flex-column px-4 px-sm-5">
    <div class="mt-5">
      <h1>Profil</h1>
      <h2 class="mt-3 option">Nom d'utilisateur</h2>
      <div class="d-flex">
        <input type="text" placeholder="Gertrude" disabled class="me-2 flex-fill">
        <button type="button" class="p-2">Modifier</button>
      </div>
      <h2 class="mt-3 option">Date de naissance</h2>
      <div class="d-flex">
        <input type="date" value="2024-01-23" disabled class="me-2 flex-fill">
        <button type="button" class="p-2">Modifier</button>
      </div>
    </div>

    <div class="d-flex flex-column mt-4">
      <h1 class="text-danger">Zone de danger</h1>
      <button type="button" class="mt-2 p-2">Modifier le mot de passe</button>
      <button type="button" class="mt-2 p-2">Reset des scores</button>
      <button type="button" class="mt-2 p-2">Supprimer le compte</button>
    </div>
  </main>
  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>