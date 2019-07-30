<?php
$parameters = parse_ini_file('../../../db.ini');

try {
  //CONNEXION VIA PDO
  $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['select'])) {
    $comp = $_POST['select'];

    $stmt = $connect->prepare('DELETE FROM `competences` WHERE `name` = :comp');
    $stmt->execute(array(":comp" => $_POST['select']));

    header("location:competences.php");
    exit;
  }
} catch (PDOException $e) {
  echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
