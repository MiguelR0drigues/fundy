<?php

function getLastId($conn) {
  $stmt = mysqli_prepare($conn, "SELECT id FROM projects ORDER BY id DESC LIMIT 1");
  if ($stmt === false) {
    echo "Error: " . mysqli_error($conn);
    return false;
  }
  
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row['id'];
  } else {
    mysqli_stmt_close($stmt);
    return false;
  }
}
?>