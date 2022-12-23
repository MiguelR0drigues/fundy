<?php

function updatePfp($id, $filename_ext, $conn){
  $stmt = mysqli_prepare($conn, "UPDATE `users` SET `pfp` = ? WHERE `id` = ?");
  mysqli_stmt_bind_param($stmt, "si", $filename_ext,$id);

  $id = $id;
  $filename_ext = $filename_ext;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
?>