<?php

$db_host = "localhost";
$db_name = "booksapi";
$db_user = "root";
$db_pass = "";

//DB connection
$pdo = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);


//Array to store data and convert to Json
$array = [
    'error' => '',
    'result' => []
];