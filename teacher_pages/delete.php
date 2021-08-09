<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$tid=$_SESSION['userid'];

$id = $_POST['id'];
$sqlDelete = "DELETE from teachers_todo_list WHERE task_id=" . $id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
