<?php 

require_once '../classes/Connection.php';
$connection = new Connection();
$connection->connect();
if(isset($_GET['id'])) $posts = $connection->get_post_byID($_GET['id']);


session_start();


include '../template/header.php';
include './navbar.php';
include './form.php';

?>

