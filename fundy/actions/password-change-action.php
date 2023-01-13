<?php
  include '../includes/db-connection.php';
  include '../functions/update-pw.php';

  $pw = $_POST["pw"];
  $pwConfirm = $_POST["pwConfirm"];
  $userId = $_GET["id"];

  updatePassword($userId,$pw,$pwConfirm,$conn);

  // TODO: Send error code

  header("Location: ../user-profile.php?id=$userId");
?>