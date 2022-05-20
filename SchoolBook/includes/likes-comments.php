<?php

require_once '../classes/Connection.php';
$connection = new Connection();
$connection->connect();

if(isset($_GET['id']) && isset($_GET['like'])) {
    $id = intval($_GET['id']);
    $like = $_GET['like'];
    $connection->addLike($like, $id);
    $num = $connection->getLike($id);
    echo $num[0]['likes'];
}

if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $comment = $_POST['comments'];
    $connection->addComment($comment, $id);
    $comments = $connection->getComment($id);
    print_r(json_encode($comments));
}

