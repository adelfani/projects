<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/schoolbook/includes/view.php">Schoolbook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="view.php">Posts</a>-->
<!--                </li>-->
            </ul>
            <div>
                <?php
                    if(isset($_SESSION['userid']))
                    {
                ?>
                    <p class="d-inline m-3 text-light"><?php echo $_SESSION['useruid']; ?></p>
                    <a href="logout.php"><button type="button" class="btn btn-primary">Log out</button></a>
                <?php
                    }
                    else
                    {
                ?>
                <a href="index.php"><button type="button" class="btn btn-dark">Log in</button></a>
                <a href="index.php"><button type="button" class="btn btn-primary">Sign up</button></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</nav>
