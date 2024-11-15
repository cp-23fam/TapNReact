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
                <p class="card-text p-3" style="color: #777777; font-weight: bold;">Deux cercles tournants affichent des points de couleurs différentes, mais seulement un point est manquant sur le disque de droite. À vous de le trouver</p>
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
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">Deux cercles clignotent avec des couleurs différentes. Cliquez lorsque les deux cercles ont la même couleur. La rapidité est la clé.</p>
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
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">Des cercles de couleurs différentes sont affichés, a vous de retenir les couleurs et trouer laquelle n’était pas affiché.</p>
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
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">Un test de réaction, classique mais efficace.</p>
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
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">Un nombre est affiché à l’écran, à vous de le retenir. Seulement le nombre augmente d’une dizaine chaque round. Quel sera votre record ?</p>
            </div>
          </div>
        </a>
      </div>

      <div class="mb-4">
        <a href="./games/reaction.php" style="font-weight: bold; text-decoration: none; color: #333333;">
          <div class="card mx-auto h-100" style="background-color: #E0E0E0 ; margin: 2vh;">
            <div class="card-body p-0">
              <h3 class="card-title text-center p-3 fw-bold" style="background-color: #A3C2D0;">JOUER !</h3>
              <img class="card-img-top p-3" src="./images/cat.jpeg" alt="Image">
              <p class="card-text p-3" style="color: #777777; font-weight: bold;">---</p>
            </div>
          </div>
        </a>
      </div>

    </div>
    </div>

  </main>

  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>