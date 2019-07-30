<?php
$parameters = parse_ini_file('../../../db.ini');

try {
  //CONNEXION VIA PDO
  $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['select']) && isset($_POST['value'])) {
    $comp = $_POST['select'];
    $percent = $_POST['value'];
    $stmt = $connect->prepare('UPDATE `competences` SET `value` = :percent WHERE `name` = :comp');
    $stmt->execute(array(":percent" => $_POST['value'], ":comp" => $_POST['select']));

    header("location:competences.php");
    exit;
  }
} catch (PDOException $e) {
  echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
