<?php 



$time = test_input($_POST['time']) ?? '';
$event = test_input($_POST['event']) ?? '';

// $erorr  = $eventErorr = '';



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
if($event && $time) {
    if(file_exists('data.json')) {
        $json = file_get_contents('data.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }
    $jsonArray[$time] = $event;
    file_put_contents("data.json", json_encode($jsonArray, JSON_PRETTY_PRINT)) ;
}

header('Location: index.php');

?>