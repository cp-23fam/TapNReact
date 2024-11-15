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
        <button type="button" class="btn mt-lg-2 mt-0 p-2" onclick="openPopup('popup-rules')">Règles du jeu</button>
        <div class="popup" id="popup-rules">
          <?php
          if ($game == 1) {
            echo "<h2>Missing Dot</h2><p>Le jeu comporte deux cercles. Votre objectif est de repérer le point de couleur manquant sur le cercle de droite. Pour indiquer sa position, vous devez donner ses coordonnées en commençant par une lettre, de A à H, suivie d’un chiffre, de 1 à 3. Au début de la partie, vous disposez de 60 secondes pour trouver le point manquant. À chaque tour que vous remportez, 10 secondes supplémentaires sont ajoutées à votre temps total.</p>";
          } elseif ($game == 2) {
            echo "<h2>Flashing Dot</h2><p>Le jeu comporte deux cercles. Votre objectif est de cliquer le plus rapidement possible lorsque les deux cercles affichent la même couleur. Le but est de réagir plus vite et de battre votre propre record de vitesse.</p>";
          } elseif ($game == 3) {
            echo "<h2>Infinite Number</h2><p>Le jeu affiche un nombre que vous devez retranscrire en bas de la page. À chaque tour, un nouveau nombre s'ajoute à la séquence existante. Vous disposez de deux secondes pour mémoriser la séquence avant de la retranscrire. Le but du jeu est de reproduire la séquence la plus longue possible sans faire d'erreur.</p>";
          } elseif ($game == 6) {
            echo "<h2>Reaction</h2><p>Ce jeu est un test de réflexes où le but est de cliquer le plus rapidement possible sur l’écran lorsqu’il devient vert.</p>";
          } elseif ($game == 7) {
            echo "<h2>Missing Color</h2><p>Le jeu affiche une multitude de points colorés à l’écran. Vous aurez 2 secondes pour mémoriser un maximum de couleurs. Une fois le temps écoulé, trois choix de couleurs vous seront proposés. Votre objectif sera de cliquer sur celle qui n’était pas présente auparavant.</p>";
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