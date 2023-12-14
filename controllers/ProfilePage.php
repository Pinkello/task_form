<?php
$config = require_once '../config.php';

$dbHost = $config['db_host'];
$dbPort = $config['db_port'];
$dbName = $config['db_name'];
$dbUser = $config['db_user'];
$dbPassword = $config['db_password'];
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'fetch') {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        try {
            $pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM forms WHERE user_id = :user_id ORDER BY submitted_at DESC';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':user_id', $user['user_id'], PDO::PARAM_STR);
            $statement->execute();
            $_SESSION['forms']  = $statement->fetchAll(PDO::FETCH_ASSOC);

            header('Location: ../views/profileCandidate.php');
            exit();
        } catch (PDOException $e) {
            echo 'Błąd połączenia: ' . $e->getMessage();
        }
    } else {
        echo "nie ma usera";
    }
} else {
    echo "źle";
}
