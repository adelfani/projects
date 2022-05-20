<div class="container position-absolute top-50 start-50 translate-middle w-50 d-flex justify-content-evenly">
    <div class="card text-dark bg-light mb-3 d-inline-flex shadow" style="max-width: 18rem;">
        <div class="card-header">Aanmelden</div>
        <div class="card-body">
            <form method="post" action="signup.php">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">naam</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="naam">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We zullen uw e-mail nooit met iemand anders delen.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">wachtwoord</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">herhaal wachtwoord</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="re-pwd">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Aanmelden</button>
            </form>
        </div>
    </div>

    <div class="card text-white bg-dark mb-3 d-inline-flex w-50 shadow" style="max-width: 18rem;">
        <div class="card-header">Log in</div>
        <div class="card-body">
            <form method="post" action="login.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Naam</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uid">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">wachtwoord</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Log in</button>
            </form>
        </div>
    </div>
</div>