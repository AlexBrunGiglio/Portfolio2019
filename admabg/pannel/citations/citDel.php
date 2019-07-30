<?php
$parameters = parse_ini_file('../../../db.ini');

try {
    //CONNEXION VIA PDO
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['select'])) {
        $id = $_POST['select'];

        $stmt = $connect->prepare('DELETE FROM `citations` WHERE `id` = :id');
        $stmt->execute(array(":id" => $_POST['select']));

        header("location:citations.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
