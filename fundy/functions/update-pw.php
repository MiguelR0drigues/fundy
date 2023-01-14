<?php 

function updatePw($id, $pw, $conn){
  $stmt = mysqli_prepare($conn, "UPDATE `users` SET `password` = ? WHERE `id` = ?");
  mysqli_stmt_bind_param($stmt, "si", $pw,$id);

  $id = $id;
  $pw = $pw;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
?>