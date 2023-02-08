<?php

function getMyProjects($id, $conn){
  $stmt = mysqli_prepare($conn, "SELECT `id`,`title`, `description`, `mainImg`, `category`, `location`, `amountNeeded`, `consultancyNeeded`, `createdAt` FROM projects WHERE ownerid = ?");
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