<?php
$parameters = parse_ini_file('../../../db.ini');

try {
    //CONNEXION VIA PDO
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['texte'])) {
        $txt = $_POST['texte'];
        $stmt = $connect->prepare("UPDATE `description` SET `text` = :txt WHERE `id` = 1");
        $stmt->execute(array(":txt" => $_POST['texte']));

        header("location:description.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
