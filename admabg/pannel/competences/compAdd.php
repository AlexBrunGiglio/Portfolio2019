<?php
$parameters = parse_ini_file('../../../db.ini');

try {
  $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['name']) && isset($_POST['value'])) {
    $comp = $_POST['name'];
    $percent = $_POST['value'];
    $stmt = $connect->prepare("INSERT INTO competences(value, name)  VALUES(?,?)");
    $stmt->execute(array($percent, $comp));
    header("location:competences.php");
    exit;
  }
} catch (PDOException $e) {
  echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
