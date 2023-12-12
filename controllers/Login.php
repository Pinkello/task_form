<?php

session_start();
if (isset($_GET['action']) && $_GET['action'] === 'login') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=nexitsoft', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM users WHERE email = :email';
            $statement = $pdo->prepare($sql);

            $statement->bindParam(':email', $email, PDO::PARAM_STR);

            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($password, $result['password'])) {
                $_SESSION['user'] = $result;
                header('Location: ../views/mainPage.php');
            } else {
                header('Location: ../views/login.php');
            }
        } catch (PDOException $e) {
            echo 'Błąd połączenia: ' . $e->getMessage();
        }
    } else {
        // Jeśli dane nie zostały przesłane metodą POST, możesz obsłużyć to tutaj
        echo "Formularz nie został przesłany poprawnie.";
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy(); // Niszczymy sesję

    // Przykładowe przekierowanie na stronę po wylogowaniu
    header("Location: ../views/login.php");
    exit();
}





// header('Location: ../views/mainPage.php');
