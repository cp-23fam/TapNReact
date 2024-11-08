<?php

class Database
{

  private $db;

  function __construct($user, $pwd)
  {
    $this->db = new PDO('mysql:host=localhost;dbname=tib', $user, $pwd);
  }

  function CreateUser(string $username, string $password, string $birth, int $idPoints)
  {
    $stmt = $this->db->prepare("INSERT INTO `portes-ouvertes`.`user` (`username`, `password`, `date_naissance`, `Points_idPoints`) VALUES (:username, :pass, :birth, :pts)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
    $stmt->bindParam(':birth', $birth, PDO::PARAM_STR);
    $stmt->bindParam(':pts', $idPoints, PDO::PARAM_INT);

    $stmt->execute();
  }

  function CreatePoints() {
    $this->db->query("INSERT INTO `portes-ouvertes`.`points` (`missing_dot`) VALUES ('');");
    return $this->db->query("SELECT `idPoints` FROM `portes-ouvertes`.`points` ORDER BY `idPoints` DESC LIMIT 1;")->fetch()['idPoints'];
  }

  function Login(string $username, string $password) {
    $stmt = $this->db->prepare("SELECT `password` FROM `portes-ouvertes`.`user` WHERE `username` = :user");
    $stmt->bindParam(':user', $username, PDO::PARAM_STR);
    $stmt->execute();

    $dbpwd = $stmt->fetch()['password'];
    return $dbpwd == $password;
  }
}
