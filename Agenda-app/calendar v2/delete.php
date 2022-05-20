<?php 

if(file_exists('data.json')) {
    $json = file_get_contents('data.json');
    $jsonArray = json_decode($json, true);
} else {
    $jsonArray = [];
}

$delete = $_POST['i'];
unset($jsonArray[$delete]);



file_put_contents('data.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: index.php");

 