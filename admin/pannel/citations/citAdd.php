<?php
$parameters = parse_ini_file('../../db.ini');

try {
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (
        isset($_POST['name'])
        && isset($_POST['text'])
    ) {
        $autor = $_POST['name'];
        $cit = $_POST['text'];
        $stmt = $connect->prepare("INSERT INTO citations(name, text)  VALUES(?,?)");
        $stmt->execute(array($autor, $cit));
        header("location:citations.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
