<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona powitalna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script>
        var error_toast = 'Brak';
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
            <div class="container-fluid">
                <button class="nav-button" onclick="openNav()">☰</button>
                <a class=" navbar-brand" href="#">Mailer</a>

            </div>
        </nav>
    </header>

    <section class="main-content">

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Strona startowa?></a>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="main col-10 col-10 col-offset-1">
                    <br />
                    <div class="title">
                        <p> Witam w aplikacji </p>

                    </div>
                    <hr>
                    <br />

                    <div class="subtitle">
                        <h4>
                            Apka do wysylania formularza
                        </h4>

                    </div>
                    <br />

                    <div class="row">
                        <div class="link1 col">
                            <div class="image fromLeft">

                                <a class="nav-link" href="https://www.codeigniter.com/user_guide/intro/index.html">
                                    <div class="image-container">
                                        <img src="assets/images/php8.png" height="300" width="400" class="hidden">
                                        <div class="text-overlay">
                                            <h3>PHP 8</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="link2 col">
                            <div class="image fromRight">
                                <a class="nav-link" href="https://www.mysql.com/">
                                    <div class="image-container">
                                        <img src="assets/images/mysql.png" height="300" width="400" class="hidden">
                                        <div class="text-overlay">
                                            <h3>MySQL</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="link1 col">
                            <div class="image fromLeft">
                                <a class="nav-link" href="https://sass-lang.com/">
                                    <div class="image-container">
                                        <img src="assets/images/sass.png" height="300" width="400" class="hidden">
                                        <div class="text-overlay">
                                            <h3>SASS</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="link2 col">
                            <div class="image fromRight">
                                <a class="nav-link" href="https://github.com/PHPMailer/PHPMailer">
                                    <div class="image-container">
                                        <img src="assets/images/bootstrap5.png" height="300" width="400" class="hidden">
                                        <div class="text-overlay">
                                            <h3>Bootstrap 5</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br />

                </div>
            </div>
        </div>

    </section>


    <footer class="footer-copyright text-center py-3">
        <a class="fi fi-gb" href="#" role="button"></a>
        <a class="fi fi-pl" href="#" role="button"></a>
        &emsp;
        © 2023 Copyright:
        <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/"> Piotr Pindel</a>
    </footer>




</body>

</html>