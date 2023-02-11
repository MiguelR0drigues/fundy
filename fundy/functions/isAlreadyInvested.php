<?php

function isAlreadyInvested($conn,$userId,$projectId){
  
  $stmt = mysqli_prepare($conn, "SELECT * FROM `project_investor` WHERE `idProject` = $projectId AND `idUser`= $userId");

  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}
?>