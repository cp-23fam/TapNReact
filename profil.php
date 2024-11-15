<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <?php require_once('components/popup.php') ?>

  <script>
    function enableInput(inputId) {
      const input = document.getElementById(inputId);
      if (input) {
        input.removeAttribute("disabled");
        // input.disabled = false;
        input.focus();
        input.addEventListener('blur', () => {
          input.disabled = true;
        });
      }
    }
  </script>

  <script>
    function Update() {
      document.getElementById('username').value = document.getElementById('username-input').value;
      document.getElementById('date').value = document.getElementById('birthday-input').value
    }
  </script>

  <title>Profil</title>
</head>

<?php
require_once("controller.php");
$c = new Controller();
$infos = $c->GetUserInfo($_COOKIE['ID']);

if (isset($_POST['apply'])) {
  $username = $c->GetUserInfo($_COOKIE['ID'])['username'];
  if ($_POST['username'] != $username && $c->UserID($_POST['username']) == 0) {
    $c->ChangeUsername($_COOKIE['ID'], $_POST['username']);
  }

  $date = $c->GetUserInfo($_COOKIE['ID'])['date_naissance'];
  if ($_POST['date'] != $date) {
    $c->ChangeDate($_COOKIE['ID'], $_POST['date']);
  }
}

if (isset($_POST['password']) && isset($_POST['old']) && isset($_POST['new'])) {
  if ($c->CanLogin($c->GetUserInfo($_COOKIE['ID'])['username'], $_POST['old'])) {
    $c->ChangePassword($_COOKIE['ID'], $_POST['new']);
  }
}

if (isset($_POST['reset'])) {
  $c->ResetScores($_COOKIE['ID']);
}

if (isset($_POST['delete']) && isset($_POST['confirm'])) {
  if ($c->CanLogin($c->GetUserInfo($_COOKIE['ID'])['username'], $_POST['confirm'])) {
    $c->DeleteAccount($_COOKIE['ID']);
    setcookie('ID', '', -1);
    header('Location: /login.php');
    exit();
  }
}

?>

<body>
  <?php require_once('components/header.php') ?>
  <main class="d-flex flex-column px-4 px-sm-5">
    <div class="mt-5">
      <form action="" method="post">
        <h1>Profil</h1>
        <h2 class="mt-3 option">Nom d'utilisateur</h2>
        <div class="d-flex">
          <input type="text" value="<?= $infos['username'] ?>" class="me-2 flex-fill" id="username-input" disabled onchange="Update();">
          <button type="button" class="p-2" onclick="enableInput('username-input');">Modifier</button>
        </div>

        <h2 class="mt-3 option">Date de naissance</h2>
        <div class="d-flex">
          <input type="date" value="<?= $infos['date_naissance'] ?>" class="me-2 flex-fill" id="birthday-input" disabled onchange="Update();">
          <button type="button" class="p-2" onclick="enableInput('birthday-input')">Modifier</button>
        </div>

        <input type="hidden" name="username" value="<?= $infos['username'] ?>" id="username">
        <input type="hidden" name="date" value="<?= $infos['date_naissance'] ?>" id="date">
        <button type="submit" class="btn btn-primary p-2 mt-4" name="apply" id="apply">Appliquer les changements</button>
      </form>

    </div>

    <div class="d-flex flex-column mt-4">
      <h1 class="text-danger">Zone de danger</h1>
      <div class="container">
        <button type="button" class="btn mt-2 p-2 btn-danger" onclick="openPopup('popup-password')">Modifier le mot de passe</button>
        <div class="popup" id="popup-password">
          <form action="" method="post">
            <h2>Modification</h2>
            <label for="old">Ancien mot de passe</label>
            <input type="password" name="old" id="old">

            <label for="new">Nouveau mot de passe</label>
            <input type="password" name="new" id="new">
            <button type="submit" name="password">MODIFIER</button>
          </form>
        </div>
      </div>

      <div class="container">
        <button type="button" class="btn mt-2 p-2 btn-danger" onclick="openPopup('popup-score')">Reset des scores</button>
        <div class="popup" id="popup-score">
          <form action="" method="post">

            <h2>Êtes-vous sûr ?</h2>
            <p>Vos scores seront remis à zéro</p>
            <button type="submit" name="reset">RESET</button>
          </form>
        </div>
      </div>

      <div class="container">
        <button type="button" class="btn mt-2 p-2 btn-danger" onclick="openPopup('popup-account')">Supprimer le compte</button>
        <div class="popup" id="popup-account">
          <form action="" method="post">
            <h2>Êtes-vous sûr ?</h2>
            <p>Votre compte sera supprimé si vous décidez de continuer</p>
            <label for="confirm">Mot de passe :</label>
            <input type="password" name="confirm">
            <button type="submit" name="delete">SUPPRIMER</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php require_once('components/footer.php') ?>

  <script>
    function openPopup(id) {
      let popup = document.getElementById(id);
      setTimeout(() => {
        window.addEventListener('click', function PopupClick({
          target
        }) {
          if (!popup.contains(target)) {
            popup.classList.remove('open-popup');
            window.removeEventListener('click', PopupClick)
          }
        });
      }, 10)

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