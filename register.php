<?php
require_once "config.php";

$email = $password  = "";
$email_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT id FROM users WHERE email = :email";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $param_email = trim($_POST["email"]);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $email_error = "Ця пошта уже зареєстрована";
                echo $email_error;
            } else {
                $email = trim($_POST["email"]);
            }
        } else {
            echo "Упс! Щось пішло не так. Спробуйте, будь ласка, пізніше.";
        }
        unset($stmt);
    }
    if (empty($email_error)) {
        $password = trim($_POST["password"]);
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if ($stmt->execute()) {
                header("location: index.html");
            } else {
                echo "Щось пішло не так. Спробуйте, будь ласка, пізніше.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>