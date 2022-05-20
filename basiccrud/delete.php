<?php
$connection = require_once 'Connect.php';
$connection->removeStudent($_POST['id']);

header('Location: http://localhost/basiccrud/');