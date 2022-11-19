<?php

$host = 'localhost';
$dbname = 'cdds';
$user_name = 'root';
$pass = '';

function DB_Connect($host, $dbname, $user_name, $pass)
{
    try {
        $db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user_name, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } catch (Exception  $e) {
        $e->getMessage();
    }

    return $db;
}

DB_Connect($host, $dbname, $user_name, $pass);