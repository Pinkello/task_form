<?php
session_start();
?>

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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        var error_toast = 'Brak';
    </script>
</head>



<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
            <div class="container-fluid">
                <button class="nav-button" onclick="openNav()">☰</button>
                <a class=" navbar-brand" href="#">Nexitsoft Forms</a>

            </div>
        </nav>
    </header>

    <section class="main-content">

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="startingPage.php">Strona startowa</a>
            <?php
            if (isset($_SESSION['user'])) { ?>
                <a href="mainPage.php">Formularz</a>
                <a href="../controllers/ProfilePage.php?action=fetch">Profil</a>
                <a href="../controllers/Login.php?action=logout">Wyloguj się</a>
            <?php } else { ?>
                <a href="login.php">Zaloguj się</a>
            <?php } ?>

        </div>