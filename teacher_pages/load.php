<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$tid=$_SESSION['userid'];
$data = array();

$result=mysqli_query($conn, "Select * from teachers_todo_list  where teacher_email='$tid'");
while($row= mysqli_fetch_array($result)){
    $data[] = array(
        'id'   => $row["task_id"],
        'title'   => $row["task"],
        'start'   => $row["start_date"],
        'end'   => $row["due_date"]
    );
}
echo json_encode($data);
?>


