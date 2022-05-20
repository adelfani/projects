<?php
$connection = require_once 'Connect.php';

$errors = [
    'voornaam' => '',
    'achternaam' => '',
    'email' => '',
    'telephone_nummmer' => '',
    'straatnaam' => '',
    'huisnummer' => '',
    'toevoeging' => '',
    'woonplaats' => '',
    'postcode' => ''
];

$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $voornaam = $_POST['voornaam'];
    $achternaam= $_POST['achternaam'];
    $email = $_POST['email'];
    $telephone_nummmer= $_POST['telephone_nummmer'];
    $straatnaam = $_POST['straatnaam'];
    $huisnummer = $_POST['huisnummer'];
    $toevoeging = $_POST['toevoeging'];
    $woonplaats = $_POST['woonplaats'];
    $postcode = $_POST['postcode'];



    if (!$_POST['voornaam'] || strlen($_POST['voornaam']) > 10) {
        $isValid = false;
        $errors['voornaam'] = "Naam is vereist en niet meer dan 10 tekens";
    }

    if (!$_POST['straatnaam']) {
        $isValid = false;
        $errors['straatnaam'] = 'dit veld is verplicht';
    }

    if (!$_POST['huisnummer']) {
        $isValid = false;
        $errors['huisnummer'] = 'dit veld is verplicht';
    }

    if (!$_POST['woonplaats']) {
        $isValid = false;
        $errors['woonplaats'] = 'dit veld is verplicht';
    }

    if (!$_POST['huisnummer']) {
        $isValid = false;
        $errors['postcode'] = 'dit veld is verplicht';
    }

    if ($isValid) {
        $id = $_POST['id'] ?? '';

        if ($id) {
            $connection->updateStudent($id, $_POST);
        } else {
            $connection->addStudent($_POST);
        }

        header('Location: http://localhost/basiccrud/');
    }
}
 include 'update.php';

