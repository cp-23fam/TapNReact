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
    $id = $this->db->CreatePoints();
    $hash = hash('sha256', $password);
    $this->db->CreateUser($username, $hash, $birth, $id);
  }

  function CanLogin(string $username, string $password) {
    $hash = hash('sha256', $password);
    return $this->db->Login($username, $hash);
  }


}