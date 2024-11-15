<?php
if (isset($_POST['logout'])) {
  setcookie('ID', '', -1);
  header('Location: /login.php');
  exit();
}
?>

<header class="bar">
  <div class="container-fluid">
    <div>
      <div class="d-flex w-100">
        <a href="/index.php" class="nav-item px-0 px-md-2 me-0 me-sm-1">Accueil</a>
        |
        <a href="/scores.php" class="nav-item px-0 px-md-2 me-0 me-sm-1">Scores</a>
        |
        <a href="/profil.php" class="nav-item px-0 px-md-2 me-0 me-sm-1">Profil</a>

        <?php if (isset($_COOKIE['ID'])): ?>
          <div class="text-end ms-auto me-2">
            <form action="" method="post">
              <button type="submit" class="btn btn-link fs-1" name="logout"><i class="fa-solid fa-right-to-bracket"></i></button>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>