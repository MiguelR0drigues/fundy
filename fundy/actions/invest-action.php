<?php
  include '../includes/db-connection.php';
  include '../functions/invest.php';
  include '../functions/isAlreadyInvested.php';
  
  $projectId = $_GET["id_project"];
  $userId = $_GET["id_user"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $amountOffered = $_POST["amountOffered"];
  $consultancyOffered = $_POST["consultancyOffered"];

  if(isAlreadyInvested($conn,$userId,$projectId)){
    header("Location: ../job-details.php?id=$projectId&error=1");
    exit;
  }
  insertInvestement($userId,$projectId,$amountOffered,$consultancyOffered,$conn);
  header("Location: ../view-investments.php?id=$userId&success=1");
  
?>
