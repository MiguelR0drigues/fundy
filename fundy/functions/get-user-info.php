<?php

function getUSerInfoById($id, $conn){
  $stmt = mysqli_prepare($conn, "SELECT `name`, `email`, `pfp`, `type`, `isVerified` FROM users WHERE id = ?");
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