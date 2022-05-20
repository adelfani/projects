<?php 

if(file_exists('data.json')) {
    $json = file_get_contents('data.json');
    $jsonArray = json_decode($json, true);
} else {
    $jsonArray = [];
}

$delete = $_POST['evenementen'];
unset($jsonArray[$delete]);



file_put_contents('data.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

$connection = require_once './connection.php';
$connection->removeEvent($_POST['id']);

header("Location: index.php");

 