<?php
include('../includes/header.php');
?>

<section id="main" class="col-12">
    <article class="row col-12">
        <div class="content_home col-10 offset-1 align-items-center">
            </br>
            <div class="col-10 form_inside">
                <form id="myForm">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Imie</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputSurname" class="form-label">Nazwisko</label>
                        <input type="text" class="form-control" id="inputSurname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <br />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </article>
</section>


<?php
include('../includes/footer.php');
?>