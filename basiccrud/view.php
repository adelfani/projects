<?php
include 'templates/header.php';
$connection = require_once 'Connect.php';
$currentStudent = $connection->getStudentById($_GET['id']);
include "errors.php";
idErrors($currentStudent);

?>



<body>
        <table class="table">
            <tbody>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $currentStudent['Email']; ?></td>
                </tr>
                <tr>
                    <th>Telephone nummer:</th>
                    <td><?php echo $currentStudent['telephone_number']; ?></td>
                </tr>
                <tr>
                    <th>Straat naam:</th>
                    <td><?php echo $currentStudent['street_name']; ?></td>
                </tr>
                <tr>
                    <th>Huis nummer:</th>
                    <td><?php echo $currentStudent['house_number']; ?></td>
                </tr>
                <tr>
                    <th>Toevoeging:</th>
                    <td><?php echo $currentStudent['huisnummer_toevoeging']; ?></td>
                </tr>
                <tr>
                    <th>Woonplaats:</th>
                    <td><?php echo $currentStudent['residence']; ?></td>
                </tr>
                <tr>
                    <th>Post code:</th>
                    <td><?php echo $currentStudent['post_cose']; ?></td>
                </tr>
            </tbody>
        </table><br>
        <div class="container">
            <div class="d-flex justify-content-center">
                <a href="http://localhost/basiccrud/"><button type="button" class="btn btn-primary">Trug</button>
            </div>
        </div>
</body>



