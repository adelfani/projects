<?php

include "templates/header.php";
$connection = require_once 'Connect.php';
$currentStudent = [
    'firstName' => '',
    'surname' => '',
    'id' => '',
    'Email' => '',
    'telephone_number' => '',
    'street_name' => '',
    'house_number' => '',
    'huisnummer_toevoeging' => '',
    'residence' => '',
    'post_cose' => '',
];

if (isset($_GET['id'])) {
    $currentStudent = $connection->getStudentById($_GET['id']);
    include "errors.php";
    idErrors($currentStudent);
}

?>

<div class="container">
    <form action="http://localhost/basiccrud/create-student.php" method="post">

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $_POST['id'] ?? $currentStudent["id"]; ?>">
                <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" class="form-control <?php echo $errors['voornaam'] ? 'is-invalid' : ''?>" value="<?php echo $currentStudent['firstName']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['voornaam']; ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" id="achternaam" class="form-control <?php echo $errors['achternaam'] ? 'is-invalid' : ''?>" value="<?php echo $_POST['achternaam'] ?? $currentStudent['surname']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['achternaam']; ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control <?php echo $errors['email'] ? 'is-invalid' : ''?>" name="email"" value="<?php echo $_POST['email'] ?? $currentStudent['Email']; ?>">
            <div class="invalid-feedback">
                <?php echo $errors['email']; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="telephone_nummmer">Telephone nummmer</label>
            <input type="text" id="telephone_nummmer" class="form-control <?php echo $errors['telephone_nummmer'] ? 'is-invalid' : ''?>" name="telephone_nummmer" value="<?php echo  $_POST['telephone_nummmer'] ?? $currentStudent['telephone_number']; ?>">
            <div class="invalid-feedback">
                <?php echo $errors['telephone_nummmer']; ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="straatnaam">straatnaam</label>
                <input type="text" name="straatnaam" id="straatnaam" class="form-control <?php echo $errors['straatnaam'] ? 'is-invalid' : ''?>" value="<?php echo $_POST['straatnaam'] ?? $currentStudent['street_name']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['straatnaam']; ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="huisnummer">huisnummer</label>
                <input type="text" name="huisnummer" id="huisnummer" class="form-control" value="<?php echo $_POST['huisnummer'] ?? $currentStudent['house_number']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['huisnummer']; ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="toevoeging">toevoeging</label>
                <input type="text" name="toevoeging" id="toevoeging" class="form-control  <?php echo $errors['straatnaam'] ? 'is-invalid' : ''?>" value="<?php echo $_POST['toevoeging'] ?? $currentStudent['huisnummer_toevoeging']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['straatnaam']; ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="woonplaats">Woonplaats</label>
                <input type="text" name="woonplaats" id="woonplaats" class="form-control <?php echo $errors['woonplaats'] ? 'is-invalid' : ''?>" value="<?php echo $_POST['woonplaats'] ?? $currentStudent['residence']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['woonplaats']; ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode" class="form-control <?php echo $errors['postcode'] ? 'is-invalid' : ''?>" value="<?php echo $_POST['postcode'] ?? $currentStudent['post_cose']; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['postcode']; ?>
                </div>
            </div>
        </div

        <a><button type="submit" class="btn btn-primary">
                <?php if ($currentStudent['id'] || (isset($_POST['id']) && $_POST['id'])): ?>
                Update
                <?php else: ?>
                Toevoegen
                <?php endif; ?>
            </button>
    </form>
</div>

<?php include "templates/footer.php"; ?>