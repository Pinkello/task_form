<?php
include('../includes/header.php');
$user = $_SESSION['user'];
$forms = $_SESSION['forms'];

?>
<section id="main" class="col-12">
    <div class="row col-12 gx-0 justify-content-center align-items-center  ">
        <div class="content_home col-10 offset-1 align-items-center">
            <div class="title_home col-8">
                <h2>Profil kandydata</h2>
            </div>
            <br />
            <div class="col-8 profile_display text-start">
                Imię: <h5 class="fw-bold "><?= $user['name'] ?></h5>
                Nazwisko: <h5 class="fw-bold "><?= $user['surname'] ?></h5>
                Email: <h5 class="fw-bold "><?= $user['email'] ?></h5>
            </div>

            <br />
            <div class="title_home col-8">
                <h2>Historia zgłoszeń kandydata</h2>
            </div>

            <?php foreach ($forms as $form) : ?>
                <div class="col-8 profile_display text-start">
                    <ol class="list-group list-group col-12">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto ">
                                <h6 class="fw-bold ">Data zgłoszenia</h6>
                                <div class="fw-bold font_blue"><?= $form['submitted_at'] ?></div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <h6 class="fw-bold ">Email</h6>
                                <div class="fw-bold font_blue"><?= $form['email'] ?></div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <h6 class="fw-bold ">Edukacja</h6>
                                <div class="fw-bold font_blue"><?= $form['education'] ?></div>
                            </div>
                        </li>
                    </ol>
                </div>
                <br />
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
include('../includes/footer.php');
?>