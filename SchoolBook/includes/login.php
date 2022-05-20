<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];


    include '../classes/Connection.php';
    include '../classes/Login.php';
    include '../classes/Login_contr.php';

    $login = new Login_contr($pwd, $uid);
    $login->loginUser();
    header("location: ../includes/view.php?error=none");

}
