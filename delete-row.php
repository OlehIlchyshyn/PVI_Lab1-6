<?php
require_once "config.php";
$id = "";
if($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = trim($_GET["index"]);
  $sql = "DELETE FROM bikedata WHERE id = :id";
  if ($stmt = $pdo->prepare($sql)) {
    $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
    $param_id = $id;
    $stmt->execute();
    unset($stmt);
  }
  unset($pdo);
}
?>