<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO bikedata (bike_name, theft_date, theft_place, details, contact_info) VALUES (:name, :date, :place, :details, :info)";
    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
      $stmt->bindParam(":date", $param_date, PDO::PARAM_STR);
      $stmt->bindParam(":place", $param_place, PDO::PARAM_STR);
      $stmt->bindParam(":details", $param_details, PDO::PARAM_STR);
      $stmt->bindParam(":info", $param_info, PDO::PARAM_STR);
      $param_name = $_POST["bikeName"];
      $param_date = $_POST["theftTime"];
      $param_place = $_POST["theftPlace"];
      $param_details = $_POST["theftDetails"];
      $param_info = $_POST["contacts"];
      if ($stmt->execute()) {
        header("location: welcome.php");
      } else {
        echo "Щось пішло не так. Спробуйте, будь ласка, пізніше.";
      }
      unset($stmt);
    }
    unset($pdo);
}
?>