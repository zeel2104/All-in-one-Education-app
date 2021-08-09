<?php  
 $connect = mysqli_connect("localhost", "root", "", "iwp_proj");  
 $query ="SELECT * FROM student_report ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>csv</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Export Mysql Table Data to CSV file from PHP</h2>  
                <h3 align="center">Student Marks</h3>                 
                <br />  
                <form method="post" action="exportcsv.php" align="center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="25%">Exam ID</th>  
                               <th width="35%">Course</th>  
                               <th width="10%">Exam Name</th>  
                               <th width="20%">Marks Scored</th>  
                               <th width="5%">Total Marks</th>  
                               <th width="5%">Percentage</th>
                               <th width="5%">Student Id</th> 
                               <th width="5%">Teacher Id</th> 
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["exam_id"]; ?></td>  
                               <td><?php echo $row["course"]; ?></td>  
                               <td><?php echo $row["exam_name"]; ?></td>  
                               <td><?php echo $row["marks_scored"]; ?></td>  
                               <td><?php echo $row["total_marks"]; ?></td> 
                               <td><?php echo $row["percentage"]; ?></td> 
                               <td><?php echo $row["stud_id"]; ?></td> 
                               <td><?php echo $row["teacher_id"]; ?></td>  
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
