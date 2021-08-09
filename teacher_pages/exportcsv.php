<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$tid=$_SESSION['userid'];
if(isset($_GET['id'])){
    $examid=$_GET['id'];
    echo $examid;
}
$res2=mysqli_query($conn,"select * from exams where exam_id='$examid'");
while($row2=mysqli_fetch_array($res2)){
    $examname=$row2['exam_name'];
    $coursename=$row2['coursename'];
}
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "iwp_proj");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename='.$coursename.'-'.$examname.'.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Course','Exam Name','Student Id','Marks Scored','Total Marks','Percentage','Teacher Id'));
      $query = "SELECT res.course,res.exam_name, res.stud_id,res.marks_scored, res.total_marks, res.percentage, res.teacher_id 
from student_report res left join exams ex 
on res.exam_id=ex.exam_id where ex.teacher_email='$tid' and res.exam_id='$examid' GROUP by res.stud_id;";
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  