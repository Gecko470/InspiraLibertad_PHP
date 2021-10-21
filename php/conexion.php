<?php

$host = "localhost";
$user = "root";
$pass = "180470";
$database = "inspiraLibertad";
$charset = "UTF8";
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

$pdo = new PDO("mysql:host={$host};dbname={$database};charset={$charset}", $user, $pass, $opt);
