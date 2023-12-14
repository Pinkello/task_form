<?php
require_once '../models/UserModel.php';
$config = require_once '../config.php';

$dbHost = $config['db_host'];
$dbPort = $config['db_port'];
$dbName = $config['db_name'];
$dbUser = $config['db_user'];
$dbPassword = $config['db_password'];

session_start();
if (isset($_GET['action']) && $_GET['action'] === 'login') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        try {
            $pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $userModel = new UserModel($pdo);
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: ../views/mainPage.php');
            } else {
                header('Location: ../views/login.php?failLogin=1');
            }
        } catch (PDOException $e) {
            echo 'Błąd połączenia: ' . $e->getMessage();
        }
    } else {
        echo "Formularz nie został przesłany poprawnie.";
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();

    header("Location: ../views/login.php");
    exit();
}
