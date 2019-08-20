<?php
$parameters = parse_ini_file('../../db.ini');

try {
    //CONNEXION VIA PDO
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (
        isset($_POST['name'])
        && isset($_POST['text'])
        && isset($_POST['select'])
    ) {
        $autor = $_POST['name'];
        $cit = $_POST['text'];
        $id = $_POST['select'];

        $stmt = $connect->prepare('UPDATE `citations` SET `name` = :autor, `text` = :cit WHERE `id`  = :id');
        $stmt->execute(array(":autor" => $autor, ":cit" => $cit, ":id" => $id));
        header("location:citations.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
