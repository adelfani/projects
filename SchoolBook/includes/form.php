
<?php  $button = isset($_GET['id']) ? "Update" :'Post';?>

<div class="container-sm d-flex justify-content-center w-50 p-3">
    <div class="card shadow p-3 mb-5 w-75 bg-body rounded">
        <h5 class="card-header">Post</h5>
        <div class="card-body">
            <form class="row g-3" method="post" action="http://localhost/schoolbook/includes/create.php" enctype="multipart/form-data">
                <?php if(isset($_GET['id'])) { ?><input type="hidden" name="id" value="<?=$_GET['id']?>"><?php }?>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Auteur</label>
                    <input type="text" class="form-control <?= $errors['Auteur'] ? 'is-invalid' : ''?>" id="inputEmail4" name="Auteur" value="<?= $posts['Auteur'] ?? '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['Auteur'] ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Titel</label>
                    <input type="text" class="form-control <?= $errors['Titel'] ? 'is-invalid' : ''?>" id="inputPassword4" name="Titel" value="<?= $posts['Titel'] ?? '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['Titel'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Bericht</label>
                    <textarea class="form-control <?= $errors['Bericht'] ? 'is-invalid' : ''?>" id="exampleFormControlTextarea1" rows="3" name="Bericht"><?= $posts['Bericht'] ?? '' ?></textarea>
                    <div class="invalid-feedback">
                        <?= $errors['Bericht'] ?>
                    </div>
                </div>
                <div class="input-group">
                    <input type="file" class="form-control <?= $errors['image'] ? 'is-invalid' : ''?>" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image" value="<?= $posts['image'] ?? '' ?>">
                    <button class="btn btn-primary w-25" type="submit" id="inputGroupFileAddon04" name="submit"><?= $button ?></button>
                    <div class="invalid-feedback">
                        <?= $errors['image'] ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

