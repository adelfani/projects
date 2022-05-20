<?php

if (isset($_POST['submit'])) {
    $uid = $_POST['naam'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $re_pwd = $_POST['re-pwd'];

    include '../classes/Connection.php';
    include '../classes/Signup.php';
    include '../classes/Signup_contr.php';

    $signup = new Signup_contr($uid, $pwd, $re_pwd, $email);
    $signup->signupUser();

    header("location: index.php?error=none");

}