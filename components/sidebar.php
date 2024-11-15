<?php
require_once('../controller.php');
$c = new Controller();
?>

<?php require_once('popup.php') ?>

<div class="col-lg-2 col-12 d-flex flex-column">
  <div class="d-flex mb-1 flex-row flex-lg-column mt-2 mt-lg-0">
    <div class="scores text-start mb-1 px-1">
      <a href="/index.php"><button class="border-0 w-100">Retour à l'accueil</button></a>
    </div>
    <div class="scores text-start px-1">
      <div class="container">
        <button type="button" class="btn mt-2 p-2" onclick="openPopup('popup-rules')">Règles du jeu</button>
        <div class="popup" id="popup-rules">
          <?php
          if ($game == 1) {
            echo "<h2>Missing Dot</h2><p>Deux cercles tournants affichent des points de couleurs différentes, mais seulement un point est manquant sur le disque de droite. À vous de le trouver</p>";
          } elseif ($game == 2) {
            echo "<h2>Flash Dot</h2><p>Deux cercles clignotent avec des couleurs différentes. Cliquez lorsque les deux cercles ont la même couleur. La rapidité est la clé.</p>";
          } elseif ($game == 3) {
            echo "<h2>Infinite Number</h2><p>Un nombre est affiché à l’écran, à vous de le retenir. Seulement le nombre augmente d’une dizaine chaque round. Quel sera votre record ?</p>";
          } elseif ($game == 4) {
            echo "<h2>Reaction</h2><p>Un test de réaction, classique mais efficace.</p>";
          } elseif ($game == 5) {
            echo "<h2>Missing Color</h2><p>Des cercles de couleurs différentes sont affichés, a vous de retenir les couleurs et trouer laquelle n’était pas affiché.</p>";
          }
          ?>
          <button type="button" onclick="closePopup('popup-rules')" style="background-color: #A3C2D0;">OK</button>
        </div>
      </div>
    </div>
  </div>
  <div class="scores text-start">
    <h3>Score :</h3>
  </div>
  <div class="scores text-start">
    <h4 id="score">0</h4>
  </div>
  <div class="scores text-start">
    <h3>Meilleur score :</h3>
  </div>
  <div class="scores text-start">
    <h4 id="highscore"><?= $c->GetHighScore($_COOKIE['ID'], $game) ?></h4>
  </div>
</div>

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