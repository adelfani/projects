<?php
require_once '../classes/Connection.php';
$connection = new Connection();
$connection->connect();
$posts = $connection->get_post();

session_start();
?>
<?php include '../template/header.php' ?>
    <body>
        <?php include 'navbar.php'?>
        <?php include 'form.php' ?>
        <div class="container-sm w-50">
            <?php foreach ($posts as $post): ?>
                <br><br>
                <div class="card mb-3 shadow w-75 ms-auto me-auto bg-body rounded">
                    <img src="../uploads/<?= $post['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['Titel'] ?></h5>
                        <p class="card-text"><?= $post['Bericht'] ?></p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text"><small class="text-muted"><?= $post['Post_datum'] ?></small></p>
                            <h4 class="auteur"><?= $post['Auteur'] ?></h4>
                        </div>
                        <input type="hidden" value="http://localhost/schoolbook/includes/likes-comments.php?id=<?= $post['id'] ?>" class="urls">
                        <button class="btn btn-outline-danger btn-sm position-relative like">
                            Like  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $post['likes'] ?></span>
                        </button>
                        <br><br>
                        <h5>Comments</h5>
                        <div class="card mt-2 mb-2 invisible comment">
                            
                        </div>
                        <form class="comments position-relative">
                            <input type="hidden" value="<?= $post['id'] ?>" name="id">
                            <textarea class="form-control textarea" rows="3" name="comments"></textarea>
                            <button class="btn btn-primary mt-2" type="submit">Comment</button>
                            <?php
                            if(isset($_SESSION['userid']))
                            {
                            ?>
                            <a href="./edit.php?id=<?= $post['id'] ?>" class="position-absolute bottom-0 end-0">Edit</a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
