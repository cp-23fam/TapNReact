<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Main</title>
</head>

<?php
if (!isset($_COOKIE['ID'])) {
  header('Location: login.php');
  exit();
}

?>

<body>
  <?php require_once('components/header.php') ?>

  <main>
    <div class="container-fluid px-auto">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5">
        <div class="mb-4">
          <a href="./games/missing-dot.php" style="text-decoration: none; color: #333333;">
            <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
              <div class="card-body p-0">
                <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
                <img class="card-img-top p-3" src="./images/missing-dot.png" alt="Image">
                <p class="card-text p-3" style="color: #777777; font-weight: bold;">The Missing Dot est un jeu de réflexe et de vision</p>
              </div>
          </a>
        </div>
      </div>
      <div class="mb-4">
        <a href="./games/flash-dot.php" style="font-weight: bold; text-decoration: none; color: #333333;">
          <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
            <div class="card-body p-0">
              <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
              <img class="card-img-top p-3" src="./images/flash-dot.png" alt="Image">
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">The Flashing Dot est un jeu de réflexe <br><span class="text-danger">/!\ Ce jeu n'est pas conseillé si vous êtes daltonien</span></p>
            </div>
          </div>
        </a>
      </div>
      <div class="mb-4">
        <a href="./games/missing-color.php" style="font-weight: bold; text-decoration: none; color: #333333;">
          <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
            <div class="card-body p-0">
              <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
              <img class="card-img-top p-3" src="./images/missing-color.png" alt="Image">
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">The Missing Color est un jeu de mémoire ou il faut trouver la couleur manquante<br><span class="text-danger">/!\ Ce jeu n'est pas conseillé si vous êtes daltonien</p>
            </div>
          </div>
        </a>
      </div>
      <div class="mb-4">
        <a href="./games/reaction.php" style="font-weight: bold; text-decoration: none; color: #333333;">
          <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
            <div class="card-body p-0">
              <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
              <img class="card-img-top p-3" src="./images/reaction.png" alt="Image">
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">The Reaction est un jeu de réflexe très simple</p>
            </div>
          </div>
        </a>
      </div>
      <div class="mb-4">
        <a href="./games/infinite-number.php" style="font-weight: bold; text-decoration: none; color: #333333;">
          <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
            <div class="card-body p-0">
              <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
              <img class="card-img-top p-3" src="./images/infinite-number.png" alt="Image">
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">The Infinite Number est un jeu de mémoire</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </main>

  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>