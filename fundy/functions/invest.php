<?php

function insertInvestement($userId, $projectId, $amount,$consultancy, $conn){
  $stmt = mysqli_prepare($conn, "INSERT INTO `project_investor`(`idProject`, `idUser`, `givenAmount`, `givenConsultancy`) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($stmt, "iiis", $param_projectId, $param_userid,$param_amount,$param_consultancy);

  $param_projectId = $projectId;
  $param_userid = $userId;
  $param_amount = $amount;
  $param_consultancy = $consultancy;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);

  return true;

  mysqli_stmt_close($stmt);
}
?>