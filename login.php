<?php
require_once('controller.php');
$c = new Controller();

if (isset($_POST['login'])) {
  if ($c->CanLogin($_POST['username'], $_POST['password'])) {
    setcookie("ID", $c->UserID($_POST['username']), time() + 3600 * 5, "/");
    header('Location: index.php');
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Login</title>
</head>

<body>
  <?php require_once('components/header.php') ?>

  <main>
    <form action="" method="post">
      <div class="container">
        <div class="row">
          <div class="col text-center" id="log">
            <input class="border-0 text-center" type="text" name="username" placeholder="Nom d'utilisateur">
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="log">
            <input class="border-0 text-center" type="password" name="password" placeholder="Mot de passe">
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="log">
            <button type="submit" class="border-0 text-center" name="login">Confirmer</button>
          </div>
        </div>
        <div class="row">
          <div class="col text-center" id="log">
            <a class="border-0 text-center" href="sign.php">Créer un compte ?</a>
          </div>
        </div>
      </div>
    </form>
  </main>


  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>