<?php
include('../includes/db-connection.php');
$project_id = $_GET["project_id"];
$user_id = $_SESSION["userID"];

$stmt = mysqli_prepare($conn, "DELETE FROM projects WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $project_id);

$project_id = $project_id;

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

header("Location: ../view-projects.php?id=$user_id?success=2");

mysqli_stmt_close($stmt);