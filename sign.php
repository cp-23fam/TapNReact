<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Sign Up</title>
</head>

<?php
require_once('controller.php');

$c = new Controller();

if (isset($_POST['signup'])) {
  $c->CreateUser($_POST['username'], $_POST['password'], $_POST['birthday']);

  //TODO Vérification Pseudo
  header('Location: login.php');
  exit();
}

?>

<body>
  <?php require_once('components/header.php') ?>

  <main>
    <form action="" method="post">
      <div class="container">
        <div class="row">
          <div class="col text-center" id="sign">
            <input class="border-0 text-center" type="text" name="username" placeholder="Nom d'utilisateur" required maxlength="45">
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="sign">
            <input class="border-0 text-center" type="password" name="password" placeholder="Mot de passe" required minlength="5" maxlength="50">
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="sign">
            <input class="border-0 text-center" type="date" name="birthday" required>
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="sign">
            <button type="submit" class="border-0 text-center" name="signup">Confirmer</button>
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="log">
            <a class="border-0 text-center" href="login.php">Déjà un compte ?</a>
          </div>
        </div>
      </div>
    </form>
  </main>


  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>