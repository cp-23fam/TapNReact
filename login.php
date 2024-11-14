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
    <div class="container-fluid my-auto">
      <form action="" method="post" class="d-flex flex-column mx-auto col col-sm-10 col-md-8 col-lg-6 col-xl-4 align-items-center">
        <input class="border-0 text-center w-75 p-3 h-100 mb-3" type="text" name="username" placeholder="Nom d'utilisateur" required maxlength="45">
        <input class="border-0 text-center w-75 p-3 h-100 mb-5" type="password" name="password" placeholder="Mot de passe" required minlength="5" maxlength="50">
        <button type="submit" class="border-0 text-center w-50 p-2 mb-1" name="login">Confirmer</button>
        <a href="sign.php">Pas de compte ?</a>
      </form>
    </div>
  </main>


  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>