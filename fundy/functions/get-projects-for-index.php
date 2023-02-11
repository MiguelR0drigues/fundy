<?php
  function get3Projects($conn) {
    $stmt = mysqli_prepare($conn, "SELECT `id`,`title`,`description`,`mainImg`,`category`,`Location`,`amountNeeded`,`consultancyNeeded`,`createdAt` FROM projects ORDER BY id DESC LIMIT 3");

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
