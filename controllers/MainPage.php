<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'submitForm') {

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=nexitsoft', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $attachment = $_FILES['attachment'];
        $attachment2 = $_FILES['attachment2'];

        // check file
        if ($attachment['error'] === UPLOAD_ERR_OK && $attachment2['error'] === UPLOAD_ERR_OK) {
            $pathInfo = pathinfo($attachment['name']);
            $pathInfo2 = pathinfo($attachment2['name']);

            $fileExtension = strtolower($pathInfo['extension']);
            $fileExtension2 = strtolower($pathInfo2['extension']);

            $allowedExtensions = ['jpg', 'jpeg', 'pdf', 'doc', 'docx'];

            // check ext
            if (in_array($fileExtension, $allowedExtensions) && in_array($fileExtension2, $allowedExtensions)) {
                $internships = [];
                if (isset($_POST['companyName']) && is_array($_POST['companyName'])) {
                    $companyNames = $_POST['companyName'];
                    $startDates = $_POST['startDate'];
                    $endDates = $_POST['endDate'];

                    foreach ($companyNames as $key => $companyName) {
                        $internships[] = [
                            'companyName' => $companyName,
                            'startDate' => $startDates[$key],
                            'endDate' => $endDates[$key],
                        ];
                    }
                }

                $attachmentPath = $attachment['tmp_name'];
                $attachmentPath2 = $attachment2['tmp_name'];

                $data = [
                    'submitted_at' => date('Y-m-d H:i:s'),
                    'user_id' => $_SESSION['user']['user_id'],
                    'name' => isset($_POST['inputName']) ? $_POST['inputName'] : '',
                    'surname' => isset($_POST['inputSurname']) ? $_POST['inputSurname'] : '',
                    'email' => isset($_POST['inputEmail']) ? $_POST['inputEmail'] : '',
                    'date' => isset($_POST['inputDate']) ? $_POST['inputDate'] : '',
                    'education' => isset($_POST['inputEducation']) ? $_POST['inputEducation'] : 'primary',
                    'LM' => file_get_contents($attachmentPath),
                    'CV' => file_get_contents($attachmentPath2),
                ];

                //check 3rd file checkbox
                if (isset($_POST['checkboxAddFile'])) {
                    $attachment3 = $_FILES['attachment3'];
                    $pathInfo3 = pathinfo($attachment3['name']);
                    $fileExtension3 = strtolower($pathInfo3['extension']);
                    $attachmentPath3 = $attachment3['tmp_name'];

                    $data['bonus_file'] = file_get_contents($attachmentPath3);

                    $sql = "INSERT INTO forms ( user_id, submitted_at, name, surname, email, birthdate, education, LM, CV, bonus_file) 
                        VALUES (:user_id, :submitted_at, :name, :surname, :email, :date, :education, :LM, :CV, :bonus_file)";
                } else {

                    $sql = "INSERT INTO forms (user_id, submitted_at, name, surname, email, birthdate, education, LM, CV) 
                        VALUES ( :user_id, :submitted_at, :name, :surname, :email, :date, :education, :LM, :CV )";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);

                $formId = $pdo->lastInsertId();

                foreach ($internships as $internship) {
                    $internshipData = [
                        'form_id' => $formId,
                        'company_name' => $internship['companyName'],
                        'start_date' => $internship['startDate'],
                        'end_date' => $internship['endDate'],
                    ];

                    $sqlInternships = "INSERT INTO internships (form_id, company_name, start_date, end_date) 
                            VALUES (:form_id, :company_name, :start_date, :end_date)";
                    $stmtInternships = $pdo->prepare($sqlInternships);
                    $stmtInternships->execute($internshipData);
                }
                unset($_SESSION['form_data']);
                header('Location: ../views/mainPage.php?success=1');
                exit();
            } else {
                $_SESSION['form_data'] = $_POST;
                header('Location: ../views/mainPage.php?fail=1');
                exit();
            }
        } else {
            header('Location: ../views/mainPage.php?fail=2');
            exit();
        }
    } catch (PDOException $e) {
        echo 'Błąd połączenia: ' . $e->getMessage();
        header('Location: ../views/mainPage.php');
        exit();
    }
} else {
    header('Location: ../views/mainPage.php');
    exit();
}
