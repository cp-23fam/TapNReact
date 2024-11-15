<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('components/head.php') ?>
  <title>Profil</title>

</head>

<?php
require_once('controller.php');
$c = new Controller();

$players = $c->GetTopsPlayers();
?>

<body>
  <?php require_once('components/header.php') ?>

  <main>
    <div class="scores mt-3 mt-sm5 mx-5">

      <div class="d-flex flex-column flex-sm-row">
        <button class="border-0 me-sm-5 me-0 text-start p-2">Classement général</button>
        <label for="game-filter" class="visually-hidden">Classement par jeu</label>
        <select id="game-filter" class="border-0 p-2 mt-3 mt-sm-0" aria-label="Classement par jeu">
          <option value="all" class="border-rounded-4">Classement par jeu</option>
          <option value="game1">Missing dot</option>
          <option value="game2">Same color</option>
          <option value="game3">Missing color</option>
          <option value="game4">Reaction</option>
          <option value="game5">Infinity Number</option>
        </select>
        <button class="border-0 me-sm-5 me-0 text-start p-2 ms-3">Confirmer</button>
      </div>
      <div>
        <h2 class="mt-4 mt-sm-5 mb-3">Général</h2>
      </div>
      <?php for ($i = 0; $i < count($players); $i++):
        $color = 'none';
        if ($i == 0)
          $color = "#D9A74E";
        else if ($i == 1)
          $color = "#5A7D9A";
        else if ($i == 2)
          $color = "#D98857";
      ?>
        <div class="player mb-2">
          <h3 class="fw-semibold"><?php echo $color != 'none' ? '<span style="color: ' . $color . ';">🜲</span>' : "" ?> <?= $players[$i]['username'] ?></h3>
          <h3 class="fw-semibold"><?= $players[$i]['total'] ?> p<b class="fw-semibold d-none d-sm-inline">oints</b></h3>
        </div>
      <?php endfor; ?>
    </div>

  </main>

  <?php require_once('components/footer.php') ?>
</body>

<?php require_once('components/script.php') ?>

</html>