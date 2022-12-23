<?php
  include '../includes/db-connection.php';
  include '../functions/update-info.php';

  $newName = $_POST["inpName"];
  $newEmail = $_POST["inpEmail"];
  $userId = $_GET["id"];

  updateInfo($userId,$newName,$newEmail,$conn);
  header("Location: ../user-profile.php?id=$userId");
?>
