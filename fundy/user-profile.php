<?php

include 'functions/get-user-info.php';
include 'includes/db-connection.php';
include 'functions/get-users.php';

$userId = $_GET['id'];
$userInfo = getUSerInfoById($userId,$conn);
if (mysqli_num_rows($userInfo) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($userInfo)) {
      echo "id: " . $userId . " - Name: " . $row["name"]. " - Type: " . $row["type"] . "<br>";
  }
} else {
  echo '0 results';
}

?>