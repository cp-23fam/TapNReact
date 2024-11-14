<?php
require_once('/controller.php');
$c = new Controller();

if (isset($_POST['game']) && isset($_POST['score'])) {
  $c->HandlePoints($_COOKIE['ID'], $_POST['game'], $_POST['score']);
}