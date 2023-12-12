<?php
include('../includes/header.php');
?>

<div class="row col-12 gx-0 justify-content-center align-items-center ">

    <div class="col-4 offset-1">
        <h4 class="titleLogin">Logowanie do systemu Forms </h4>
        <hr />
        <br />

        <form id="form_login" action="../controllers/Login.php?action=login" method="post" autocomplete="off">

            <div class="form-group">
                <h5><label for="email">Podaj adres email</label></h5>
                <input type="text" id="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <h5><label for="password">Podaj hasło</label></h5>
                <input type="password" id="password" class="form-control" name="password" placeholder="Hasło">
            </div>
            <div class="d-grid gap-2 mx-auto">
                <button class="btn btn-primary" type="submit">Zaloguj się</button>
            </div>
        </form>
    </div>
    <div class="col-6 offset-1 imgContainer">
        <img id="login" src="../assets/images/photoLogin.jpg" class="imgContainer" height="600" width="700" class="hidden">
    </div>
</div>

<?php
include('../includes/footer.php');
?>