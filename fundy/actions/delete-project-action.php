<?php
include('../includes/db-connection.php');
$user_id = $_GET["user_id"];
$project_id = $_GET["project_id"];

$stmt = mysqli_prepare($conn, "DELETE FROM projects WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ii", $project_id, $user_id);

$project_id = $project_id;
$user_id = $user_id;

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

header("Location: ../view-projects.php?id=$user_id");

mysqli_stmt_close($stmt);