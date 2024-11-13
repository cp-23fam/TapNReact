<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('../components/head.php') ?>
  <title>Infinite Number</title>
  <script src="/script/infinite-number.js"></script>
</head>

<body onload="init();">
  <?php require_once('../components/header.php') ?>

  <main style="background-color: #F7F7F7;">
    <div class="container-fluid p-0 row mx-0 mx-lg-auto py-auto my-0 my-lg-auto">
      <div class="col-lg-10 col-12">
        <canvas class="template ratio ratio-lg-4x3 ratio-16x9" id="game"></canvas>
        <div class="d-flex">
          <input type="number" name="number" id="input">
          <button type="button" id="button">Confirmer</button>
        </div>
      </div>
      <?php require_once('../components/sidebar.php') ?>
    </div>
    </div>
  </main>

  <?php require_once('../components/footer.php') ?>
</body>

<?php require_once('../components/script.php') ?>

</html>