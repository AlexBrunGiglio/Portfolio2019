<?php
$parameters = parse_ini_file('../../../db.ini');

try {
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (
        isset($_POST['name'])
        && isset($_POST['datacat'])
        && isset($_POST['t_projet'])
        && isset($_POST['dscp'])
        && isset($_POST['client'])
        && isset($_POST['c_image'])
        && isset($_POST['link'])
        && isset($_POST['m_image'])
        && isset($_POST['image_1'])
        && isset($_POST['image_2'])
        && isset($_POST['image_3'])
    ) {
        $name = $_POST['name'];
        $datacat = $_POST['datacat'];
        $t_proj = $_POST['t_projet'];
        $dscp = $_POST['dscp'];
        $client = $_POST['client'];
        $src = $_POST['c_image'];
        $link = $_POST['link'];
        $m_img = $_POST['m_image'];
        $img1 = $_POST['image_1'];
        $img2 = $_POST['image_2'];
        $img3 = $_POST['image_3'];
        $stmt = $connect->prepare("INSERT INTO projets (name, data_cat, category, description, client, credit_image, link, image_min, image_1, image_2, image_3)  VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($name, $datacat, $t_proj, $dscp, $client, $src, $link, $m_img, $img1, $img2, $img3));
        header("location:projets.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
