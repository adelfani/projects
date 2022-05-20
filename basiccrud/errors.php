<?php

function idErrors($currentStudent) {
    if (!isset($_GET['id'])) {
        echo '<h3 class="alert alert-danger d-flex justify-content-center">404</h3>';
        exit();
    }

    if (!$currentStudent) {
        echo '<h3 class="alert alert-danger d-flex justify-content-center">404</h3>';
        exit();
    }
}

function name($name) {
    if (strlen($name) > 10) {
        return false;
    }
}

function emailVValidation($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    }
}







