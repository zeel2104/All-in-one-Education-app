<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$studid=$_SESSION['studid'];
$data = array();

$result=mysqli_query($conn, "Select * from students_todo_list  where st_mail='$studid'");
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


