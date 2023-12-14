<?php
include('../includes/header.php');
if (isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
}

?>

<section id="main" class="col-12">
    <article class="row col-12">
        <div class="content_home col-10 offset-1 align-items-center">
            <div class="title_home col-8">
                <h2>Formularz kandydatów Nexitsoft</h2>
            </div>

            <h5>Drogi kandydacie - prosimy o wypełnienie poniższego formularza.</h5>

            </br>
            <div class="col-10 form_inside">
                <form id="myForm" action="../controllers/MainPage.php?action=submitForm" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="inputName" class="form-label"><b>Imie</b></label>
                                <input type="text" class="form-control" id="inputName" value="<?php echo $formData['inputName'] ?? ''; ?>" name="inputName">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="inputSurname" class="form-label"><b>Nazwisko</b></label>
                                <input type="text" class="form-control" id="inputSurname" name="inputSurname" value="<?php echo $formData['inputSurname'] ?? ''; ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label"><b>Email address</b></label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $formData['inputEmail'] ?? ''; ?>" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="inputDate" class="form-label"><b>Data</b></label>
                            <input type="date" class="form-control" id="inputDate" name="inputDate" value="<?php echo $formData['inputDate'] ?? ''; ?>" aria-describedby="inputDate">
                        </div>

                        <div class="mb-3">
                            <label for="inputEducation" class="form-label"><b>Wykształcenie</b></label>
                            <select class="form-select" name="inputEducation" id="inputEducation" aria-label="Select internship">
                                <option value="" <?php echo empty($formData['inputEducation']) ? 'selected' : ''; ?>>Wybierz wykształcenie</option>
                                <option value="primary" <?php echo ($formData['inputEducation'] ?? '') === 'primary' ? 'selected' : ''; ?>>Podstawowe</option>
                                <option value="secondary" <?php echo ($formData['inputEducation'] ?? '') === 'secondary' ? 'selected' : ''; ?>>Średnie</option>
                                <option value="higher" <?php echo ($formData['inputEducation'] ?? '') === 'higher' ? 'selected' : ''; ?>>Wyższe</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="attachment" class="form-label"><b>List Motywacyjny</b></label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                            <div class="form-text">Akceptowane formaty: DOC, PDF, JPG/JPEG</div>
                        </div>

                        <div class="mb-3">
                            <label for="attachment" class="form-label"><b>CV</b></label>
                            <input type="file" class="form-control" id="attachment2" name="attachment2">
                            <div class="form-text">Akceptowane formaty: DOC, PDF, JPG/JPEG</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="checkboxAddFile" name="checkboxAddFile">
                                <label class="form-check-label" for="checkboxAddFile">
                                    <h5><b>
                                            Dodaj kolejny plik
                                        </b></h5>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 checks hidden">
                            <label for="attachment" class="form-label"><b>Dodatkowy plik</b></label>
                            <input type="file" class="form-control" id="attachment3" name="attachment3">
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5><b>Staże</b></h5>
                        <div id="internshipContainer"></div>
                        <br />
                        <div id="internship-error"></div>
                        <br />
                        <button type="button" id="addInternshipBtn" class="btn btn-primary">Dodaj staż</button>
                        <button type="button" id="removeInternshipBtn" class="btn btn-danger" style="display: none;">Usuń staż</button>

                    </div>
                    <br />

                    <button type="button" id="submitButton" class="btn btn-primary">Submit</button>

                </form>
            </div>




        </div>

    </article>
</section>


<?php
include('../includes/footer.php');
?>