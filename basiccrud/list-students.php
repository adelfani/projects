<?php

$connection = require_once 'Connect.php';
$student = $connection->getStudents();

?>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($student as $data) { ?>
        <tr>
            <td><?php echo $data["id"]; ?></td>
            <td><?php echo $data["firstName"]; ?></td>
            <td><?php echo $data["surname"]; ?></td>
            <td><a href="update.php/?id=<?php echo $data["id"]; ?>"><button type="button" class="btn btn-primary">Wijzig</button></a>
                <a href="view.php/?id=<?php echo $data["id"]; ?>"><button type="button" class="btn btn-primary">info</button></a>
                <form action="delete.php" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <?php include 'model.php';?>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>


