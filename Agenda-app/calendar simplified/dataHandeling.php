<?php 

$connection = require_once "./connection.php";

$time = test_input($_POST['tijd']) ?? '';
$event = test_input($_POST['evenementen']) ?? '';
$date = test_input($_POST['datum']) ?? '';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
if($event && $time && $date) {
    if(file_exists('data.json')) {
        $json = file_get_contents('data.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = []; 
    }
    $jsonArray[$event] = ['time' => $time, 'date' => $date];
    file_put_contents("data.json", json_encode($jsonArray, JSON_PRETTY_PRINT)) ;
}


$connection->addEvent($_POST);

header('Location: index.php');

?> 