<?php

session_start();

$_SESSION['user'] = "user";
header('Location: ../views/mainPage.php');
