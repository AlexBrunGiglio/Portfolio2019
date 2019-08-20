<?php
$parameters = parse_ini_file('../../db.ini');

try {
    //CONNEXION VIA PDO
    $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (
        isset($_POST['select'])
        && isset($_POST['name'])
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
        $id = $_POST['select'];
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

        $stmt = $connect->prepare('UPDATE `projets` SET `name` = :name, `data_cat` = :datacat, `category` = :t_proj, `description` = :dscp, `client` = :client, `credit_image` = :src, `link` = :link, `image_min` = :m_img, `image_1` =:img1, `image_2`=:img2,  WHERE `id` = :id');
        $stmt->execute(array($id, $name, $datacat, $t_proj, $dscp, $client, $src, $link, $m_img, $img1, $img2, $img3));
        header("location:projets.php");
        exit;
    }
} catch (PDOException $e) {
    echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}
