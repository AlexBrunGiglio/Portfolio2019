<?php

$parametre = parse_ini_file('../db.ini');
try {
	$connect = new PDO($parametre['host'], $parametre['user'], $parametre['pass']);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Fetching Values from URL
	$php_name = $_POST['ajax_name'];
	$php_email = $_POST['ajax_email'];
	$php_message = $_POST['ajax_message'];
} catch (\Exception $e) {
	echo $e->getMessage() . "<br>";
	echo $e->getCode() . "<br>";
}

$query = "INSERT INTO mail(name, email, message) VALUES(?,?,?)";
$sql = $connect->prepare($query);
$sql->execute([$php_name, $php_email, $php_message]);
$message = $_POST['ajax_message'];
$headers = "Email en provenance de : " . $php_email . "";
$to = "postmaster@alexandrebrungiglio.fr";
$subject = "De : " . $php_name . "";
mail($to, $headers, $subject, $message);
exit;
