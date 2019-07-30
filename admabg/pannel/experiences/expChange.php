<?php
$parameters = parse_ini_file('../../../db.ini');

try {
  //CONNEXION VIA PDO
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

    $stmt = $connect->prepare('UPDATE `parcours` SET  `icon` = :ico, `date` = :date, `title` = :title, `description` = :dscp  WHERE `id` = :id');
    $stmt->execute(array(":ico" => $_POST['icon'], ":date" => $_POST['date'], ":title" => $_POST['titre'], ":dscp" => $_POST['description'], ":id" => $_POST['select']));

    header("location:experience.php");
    exit;
  } else {
    header("location:experience.php");
  }
} catch (PDOException $e) {
  echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
