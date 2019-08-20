<?php
$parameters = parse_ini_file('../../db.ini');

try {
    //CONNEXION VIA PDO
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        $stmt = $connect->prepare("UPDATE `color` SET `color` = :color WHERE `id` = 1");
        $stmt->execute(array(":color" => $_POST['color']));

        header("location:color.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
