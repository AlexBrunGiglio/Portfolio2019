<?php
$parameters = parse_ini_file('../../../db.ini');

try {
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (
        isset($_POST['img_sm'])
        && isset($_POST['img_b'])
        && isset($_POST['title'])
        && isset($_POST['lieu'])
        && isset($_POST['date'])
        && isset($_POST['dscp'])
        && isset($_POST['txt'])
        && isset($_POST['web'])
        && isset($_POST['facebook'])
    ) {
        $imgP = $_POST['img_sm'];
        $imgG = $_POST['img_b'];
        $title = $_POST['title'];
        $lieu = $_POST['lieu'];
        $date = $_POST['date'];
        $dscp = $_POST['dscp'];
        $txt = $_POST['txt'];
        $web = $_POST['web'];
        $fb = $_POST['facebook'];
        $stmt = $connect->prepare("INSERT INTO blog(image_s, image_b, titre, lieu, date, description, text, site_web, facebook)  VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($imgP, $imgG, $title, $lieu, $date, $dscp, $txt, $web, $fb));
        header("location:blog.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
