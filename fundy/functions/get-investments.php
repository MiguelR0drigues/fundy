<?php

function getInvestments($id, $conn){
  $stmt = mysqli_prepare($conn, "SELECT givenAmount, givenConsultancy, p.id as project_id, p.title as title, p.description as description, p.mainImg as image, p.category as category, p.Location as location, p.amountNeeded as amountNeeded, p.consultancyNeeded as consultancyNeeded FROM `project_investor` as pi JOIN projects as p on pi.idProject = p.id where pi.idUser = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);

  $id = $id;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    return $result;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}
?>