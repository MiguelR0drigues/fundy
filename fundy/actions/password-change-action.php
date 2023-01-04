<?php
  include '../includes/db-connection.php';
  include '../functions/update-pw.php';
  include '../functions/compare-pw.php';

  $pw = $_POST["pw"];
  $confirmPw = $_POST["confirmPw"];
  $userId = $_GET["id"];

  echo $confirmPw != $pw ? "true" : "false";

  // error 1 = password and confirm didn't match
  if($confirmPw != $pw){
    return header("Location: ../user-profile.php?id=$userId&error=1");
  }
  
  // error 2 = password is the same as the current one
  if(isPwSame($userId, $pw, $conn)){
    echo "entrei";
    return header("Location: ../user-profile.php?id=$userId&error=2");
  }

  updatePw($userId,$pw,$conn);
  return header("Location: ../user-profile.php?id=$userId&success=1");
?>
