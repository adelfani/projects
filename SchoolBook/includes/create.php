<?php

require_once '../classes/Connection.php';
$connection = new Connection();
$connection->connect();

$errors = [
    'Auteur' => '',
    'Titel' => '',
    'Bericht' => '',
    'image' =>''
];


$is_valid = true;

if(isset($_POST['submit'])) {
    if (!$_POST['Auteur']) {
        $is_valid = false;
        $errors['Auteur'] = 'Dit veld is verplicht';
    }

    if (!$_POST['Titel']) {
        $is_valid = false;
        $errors['Titel'] = 'Dit veld is verplicht';
    }

    if (!$_POST['Bericht']) {
        $is_valid = false;
        $errors['Bericht'] = 'Dit veld is verplicht';
    }

    if (isset($_FILES)) {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if($error === 0) {
            if ($image_size > 1250000) {
                $errors['image'] = 'bestand te groot';
                $is_valid = false;
            } else {
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $toegestaan_img = ['jpg', 'jpeg', 'png'];

                if(in_array($img_ex_lc, $toegestaan_img)) {
                    $nieuw_img_id = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../uploads/'.$nieuw_img_id;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $_POST['image'] = $nieuw_img_id;
                } else {
                    $is_valid = false;
                    $errors['image'] = 'U kunt niet deze bestand uploaden';
                }
            }

        } else {
            $is_valid = false;
            $errors['image'] = 'U moet een afbeelding uploaden';
        }
    }
} else {
    $is_valid = false;
}

if(isset($_POST['id']) && $is_valid) {
    intval($_POST['id']);
    $connection->update_post($_POST);
    header('Location: http://localhost/schoolbook/includes/view.php');
} else if (isset($_POST['id']) && !$is_valid) {
    $_GET['id'] = $_POST['id'];
    include './edit.php';
} else if ($is_valid) {
    $connection->add_post($_POST);
    header('Location: http://localhost/schoolbook/includes/view.php');
} else {
    include 'view.php';
}



// if($is_valid) {
//     $connection->add_post($_POST);
//     header('Location: http://localhost/schoolbook/includes/view.php');
// } else {
//     include 'view.php';
// }

