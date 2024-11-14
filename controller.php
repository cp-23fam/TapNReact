<?php
session_start();
require_once('database.php');

class Controller {

  private $db;

  function __construct()
  {
    $env = parse_ini_file('.env');
    $this->db = new Database($env['USERNAME'], $env['PWD']);
  }

  function CreateUser(string $username, string $password, string $birth) {
    $hash = hash('sha256', $password);
    $this->db->CreateUser($username, $hash, $birth);
    $id = $this->db->GetUserID($username);

    $this->db->CreatePoints($id);
  }

  function CanLogin(string $username, string $password) {
    $hash = hash('sha256', $password);
    return $this->db->Login($username, $hash);
  }

  function HandlePoints($user, $game, $points) {
    $dbPoints = $this->db->ReturnUserPoints($user);

    if ($dbPoints[$game] < intval($points)) {
      $this->db->SetUserPoints($user, $game, $points);
    }
  }

  function UserID($username) {
    return $this->db->GetUserID($username);
  }

  function GetHighScore($id, $game) {
    return $this->db->GetHighScore(intval($id), $game);
  }
}