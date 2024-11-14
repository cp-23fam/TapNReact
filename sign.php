<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Sign Up</title>
</head>

<?php
require_once('controller.php');

$c = new Controller();
$error = "<NE DOIT PAS APPARAITRE>";

if (isset($_POST['signup'])) {
  if ($c->UserID($_POST['username']) == 0) {
    $c->CreateUser($_POST['username'], $_POST['password'], $_POST['birthday']);
    header('Location: login.php');
    exit();
  } else {
    $error = "Nom d'utilisateur déjà existant";
  }
}

?>

<body>
  <?php require_once('components/header.php') ?>

  <main class="d-flex flex-column">
    <div class="container-fluid my-auto">
      <form action="" method="post" class="d-flex flex-column mx-auto my-auto col col-sm-10 col-md-8 col-lg-6 col-xl-4 align-items-center">
        <input class="border-0 text-center w-75 p-3 h-100 mb-3" type="text" name="username" placeholder="Nom d'utilisateur" required maxlength="45" value="<?php echo isset($_POST['username']) == true ? $_POST['username'] : "" ?>">
        <input class="border-0 text-center w-75 p-3 h-100 mb-3" type="password" name="password" placeholder="Mot de passe" required minlength="5" maxlength="50">
        <input class="border-0 text-center w-75 p-3 h-100 mb-3" type="date" name="birthday" required max="9999-12-31" value="<?php echo isset($_POST['birthday']) == true ? $_POST['birthday'] : "" ?>">
        <p class="w-100 h-100 text-danger text-center <?php echo $error == "<NE DOIT PAS APPARAITRE>" ? "invisible" : "" ?>"><?= htmlspecialchars($error) ?></p>
        <button type="submit" class="border-0 text-center w-50 p-2 mb-1 mt-3" name="signup">Confirmer</button>
        <a href="login.php">Déjà un compte ?</a>
      </form>
    </div>
  </main>


  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>