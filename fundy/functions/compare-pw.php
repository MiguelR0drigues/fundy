<?php

function isPwSame($id, $pw, $conn){
  $stmt = mysqli_prepare($conn, "SELECT `password` FROM users WHERE id=?");
  mysqli_stmt_bind_param($stmt, "i", $id);

  $id = $id;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt); 
  $row = mysqli_fetch_assoc($result);
  return $row["password"] == $pw;
  mysqli_stmt_close($stmt);

}