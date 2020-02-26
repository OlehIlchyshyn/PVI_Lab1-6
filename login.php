<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$email = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $sql = "SELECT id, email, password, isadmin FROM users WHERE email = :email";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $param_email = $email;
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    $id = $row["id"];
                    $email = $row["email"];
                    $hashed_password = $row["password"];
                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;
                        if ($row["isadmin"]) {
                            header("location: admin.php");
                        }
                        else {
                            header("location: welcome.php");
                        }
                    } else {
                        echo "Введено неправильний пароль.";
                    }
                }
            } else {
                echo "Введено неправильний email";
            }
        } else {
            echo "Упс! Щось пішло не так. Спробуйте, будь ласка, пізніше.";
        }
        unset($stmt);
    }
    unset($pdo);
}
?>