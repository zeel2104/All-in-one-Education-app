<!DOCTYPE html>
<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
?>
<html lang="en">
<head>
<title>Sign In</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="signin.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body{
            background-image: url("common_images/signinbg.jpg");
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['submit1'])){

    $studid=$_POST['st_email'];
    $psd=$_POST['st_pwd'];
    $sql="Select * from student where st_mail='$studid' and st_pass='$psd'";
    $res=mysqli_query($conn,$sql);
    $tot=mysqli_num_rows($res);
    if($tot==1){
        $_SESSION['studid'] = $studid;
        header('location:student_pages/stud_dash.php');
    }
    else{
        echo "login not ok";
    }

}

?>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Student's Login</h3>
            <form method="post" name="student_form">
                <div class="form-group">
                    <input type="text" class="form-control" name="st_email" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="st_pwd" placeholder="Your Password *" value=""/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit1" class="btnSubmit" value="Login" />
                </div><br>
                <div>
                    <a href="signup.php">Dont have and account? Sign Up</a>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['submit2'])){

            $teacherid=$_POST['email'];
            $pwd=$_POST['pwd'];

            $sql="Select * from teachers where tch_email='$teacherid' and tch_password='$pwd'";
            $result=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($result);
            if($total==1){
                $_SESSION['userid'] = $teacherid;
                header('location:teacher_pages/teacher_dashboard.php');
            }
            else{
                echo "login not ok";
            }

        }

        ?>
        <div class="col-md-6 login-form-2">
            <h3>Teacher's Login</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" name="email" required="required"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Your Password *" name="pwd" required="required" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" name="submit2" value="Login" />
                </div><br>
                <div>
                    <a href="signup.php">Dont have and account? Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

















