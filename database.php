<?php

class Database
{

  private $db;

  function __construct($user, $pwd)
  {
    $this->db = new PDO('mysql:host=localhost;dbname=portes-ouvertes', $user, $pwd);
  }

  function CreateUser(string $username, string $password, string $birth)
  {
    $stmt = $this->db->prepare("INSERT INTO `portes-ouvertes`.`user` (`username`, `password`, `date_naissance`) VALUES (:username, :pass, :birth)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
    $stmt->bindParam(':birth', $birth, PDO::PARAM_STR);

    $stmt->execute();
  }

  function GetUserID(string $username)
  {
    $stmt = $this->db->prepare("SELECT `idUser` FROM `portes-ouvertes`.`user` WHERE `username` = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();
    if ($result != false) {
      return $result['idUser'];
    } else {
      return 0;
    }
  }

  function CreatePoints(int $idUser)
  {
    $this->db->query("INSERT INTO `portes-ouvertes`.`points` (`user_idUser`) VALUES ($idUser);");
  }

  function Login(string $username, string $password)
  {
    $stmt = $this->db->prepare("SELECT `password` FROM `portes-ouvertes`.`user` WHERE `username` = :user");
    $stmt->bindParam(':user', $username, PDO::PARAM_STR);
    $stmt->execute();

    $dbpwd = $stmt->fetch()['password'];
    return $dbpwd == $password;
  }

  function ReturnUserPoints(int $idUser)
  {
    $request = $this->db->query("SELECT `missing_dot`, `same_color`, `endless_number`, `wanted`, `pattern`, `reaction`, `missing_color` FROM `portes-ouvertes`.`points` WHERE `user_idUser` = $idUser");
    return $request->fetch();
  }

  function GetGameName($gameID)
  {
    switch ($gameID) {
      case 2:
        $gameName = "same_color";
        break;
      case 3:
        $gameName = "endless_number";
        break;
      case 6:
        $gameName = "reaction";
        break;
      case 7:
        $gameName = "missing_color";
        break;
    }

    return $gameName;
  }

  function SetUserPoints(int $idUser, int $game, int $points)
  {
    $gameName = $this->GetGameName($game);

    $stmt = $this->db->prepare("UPDATE `portes-ouvertes`.`points` SET `$gameName` = :points WHERE `user_idUser` = :user");
    $stmt->bindParam(':user', $idUser, PDO::PARAM_INT);
    $stmt->bindParam(':points', $points, PDO::PARAM_INT);

    $stmt->execute();
  }

  function GetHighScore($idUser, $game)
  {
    $gameName = $this->GetGameName($game);
    $stmt = $this->db->prepare("SELECT `$gameName` FROM `portes-ouvertes`.`points` WHERE `user_idUser` = :id");
    $stmt->bindParam(':id', $idUser, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetch();

    if ($result != false) {
      return $result[$gameName];
    } else {
      return 0;
    }
  }

  function ReturnTopPlayers()
  {
    return $this->db->query("SELECT `username`, `date_naissance`, (`missing_dot` + `same_color` + `endless_number` + `wanted` + `pattern` + `reaction` + `missing_color`) AS `total`, `missing_dot`, `same_color`, `endless_number`, `wanted`, `pattern`, `reaction`, `missing_color` FROM `portes-ouvertes`.`user` INNER JOIN `portes-ouvertes`.`points` ON `user`.`idUser` = `points`.`user_idUser` ORDER BY `total` DESC LIMIT 5;")->fetchAll();
  }
}
