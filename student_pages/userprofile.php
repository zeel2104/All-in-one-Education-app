<?php $servername="localhost";
$user= "root";
$pwd="";

$conn=mysqli_connect("localhost","root","","iwp_proj");

if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    echo $id;
    $sql_query="SELECT * FROM teachers WHERE teacher_id='$id' ";
}
    $result = mysqli_query($conn, "select * from teachers");
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['teacher_id'];
        $name = $row['tch_name'];
        $email = $row['tch_email'];
        $pwd = $row['tch_password'];
        $addr = $row['tch_address'];
        $phn = $row['tch_phnno'];
        $c1 = $row['tch_course1'];
        $c2 = $row['tch_course2'];
        $c3 = $row['tch_course3'];

}
?>
<?php
if(isset($_POST['update'])) {

    $tchemail=$_POST['email'];
    $tchpwd=$_POST['pwd'];
    $tchaddr=$_POST['addr'];
    $tchphnno=$_POST['phn'];

    $sql_query = "UPDATE teachers SET tch_email='$tchemail',tch_password='$tchpwd',tch_address='$tchaddr' WHERE teacher_id='$id' ";
    $res=mysqli_query($conn, $sql_query);
    if($res){
        echo"Updated";
    }
    else{
        echo"Not updated";
    }
}
?>
<html>
<form method="post">
    Teacher id: <?php echo $id;?><br><br>
    Teacher name: <?php echo $name;?><br><br>
    Change Email: <input type="email" name="email" value="<?php echo $email?>"><br><br>
    Change password: <input type="text" name="pwd" value="<?php echo $pwd;?>"><br><br>
    Change Address: <input type="text" name="addr" value="<?php echo $addr;?>"><br><br>
    Change Phone no: <input type="text" name="phn" value="<?php echo $phn;?>"><br><br>
    Courses: 1. <?php echo $c1;?><br>
    Courses: 2. <?php echo $c2;?><br>
    Courses: 3. <?php echo $c3;?><br>
    <input type="submit" value="Update" name="update">
    </form>
</html>

