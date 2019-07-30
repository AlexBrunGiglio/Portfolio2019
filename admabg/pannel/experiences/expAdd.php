<?php
$parameters = parse_ini_file('../../../db.ini');

try {
  $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (
    isset($_POST['date'])
    && isset($_POST['titre'])
    && isset($_POST['description'])
    && isset($_POST['icon'])
  ) {
    $ico = $_POST['icon'];
    $date = $_POST['date'];
    $title = $_POST['titre'];
    $dscp = $_POST['description'];
    $stmt = $connect->prepare("INSERT INTO parcours(icon, date, title, description)  VALUES(?,?,?,?)");
    $stmt->execute(array($ico, $date, $title, $dscp));
    header("location:experience.php");
    exit;
  }
} catch (PDOException $e) {
  echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
