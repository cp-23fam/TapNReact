<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('../components/head.php') ?>
  <title>Missing Dot</title>
  <script src="../script/flash-dot.js"></script>
</head>

<body onload="init();">
  <?php require_once('../components/header.php') ?>

  <main style="background-color: #F7F7F7;">
    <div class="container-fluid p-0 row mx-0 mx-lg-auto py-auto my-0 my-lg-auto">
      <div class="col-lg-10 col-12">
        <canvas class="template ratio ratio-lg-4x3 ratio-16x9" id="game"></canvas>
      </div>
      <?php require_once('../components/sidebar.php') ?>
    </div>
    </div>
  </main>

  <?php require_once('../components/footer.php') ?>
</body>

<?php require_once('../components/script.php') ?>

</html>