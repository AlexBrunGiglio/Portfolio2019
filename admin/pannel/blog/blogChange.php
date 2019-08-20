<?php
$parameters = parse_ini_file('../../../db.ini');

try {
    //CONNEXION VIA PDO
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
        && isset($_POST['select'])
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
        $id = $_POST['select'];
        $web = $_POST['web'];
        $fb = $_POST['facebook'];

        $stmt = $connect->prepare('UPDATE `blog` SET `image_s` = :imgP, `image_b` = :imgG, `titre` = :title, `lieu` = :lieu, `date` = :date, `description` = :dscp, `text` = :txt, `site_web` = :web, `facebook` = :fb WHERE `id`= :id');
        $stmt->execute(array(":imgP" => $imgP, ":imgG" => $imgG, ":title" => $title, ":lieu" => $lieu, ":date" => $date, ":dscp" => $dscp, ":txt" => $txt, ":web" => $web, ":fb" => $fb, ":id" => $id));
    }
    header("location:blog.php");
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
