<?php
$opt = parse_ini_file("db.ini");
try {
    $DB = new PDO($opt["host"], $opt["user"], $opt["pass"]);
} catch (Exception $e) { }
