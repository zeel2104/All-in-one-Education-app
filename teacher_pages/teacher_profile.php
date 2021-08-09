<!DOCTYPE html>
<html lang="en">
<?php $servername="localhost";
$user= "root";
$pwd="";

$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$teacherid=$_SESSION['userid'];

    $result = mysqli_query($conn, "select * from teachers where tch_email='$teacherid'");
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

    $sql_query = "UPDATE teachers SET tch_password='$tchpwd',tch_phnno='$tchphnno',tch_address='$tchaddr' WHERE tch_email='$teacherid' ";
    $res=mysqli_query($conn, $sql_query);
    if($res){

        echo"Updated";
    }
    else{
        echo"Not updated";
    }
}
?>
<head>
	<title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        body{
            background: linear-gradient(to right, #63579f 0%, #544895 100%);
        }
        nav{
            background-color: black;
            opacity: 85%;
        }
        a{
            font-size: 20px;
        }
        nav{
            width: 100%;
        }
        .banner-area{
            background-image: url("img/banner-bg.png");
            height: 20%;
        }
        h1 {
            font-size: 50px;
            word-break: break-all;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        img{
            width: 100%;
            height: 250px;
        }
        #notheader{
            padding: 50px;
        }
        form{
            border-left: dodgerblue 10px solid;
        }
        .profile{
            background-color: whitesmoke;
            padding: 30px;
            margin-top: 30px;
        }
        card{
            padding: 10px;
        }
    </style>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="row pull-right">
            <div id="logo">
            </div>
            <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
                <a class="navbar-brand" href="#"><h3><b>Edukit</b></h3></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                    <ul class="navbar-nav mr-auto pull-left">
                        <li class="nav-item active">
                            <a class="nav-link" href="teacher_dashboard.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teachers_todo.php">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">Courses</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Exams
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="add_exam.php">New Exam</a>
                                <a class="dropdown-item" href="manage_exam.php">Manage Exam</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Assignments
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="new_assignment.php">Upload Assignments</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons pull-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                 aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="signout.php">Logout</a>
                                <a class="dropdown-item" href="teacher_profile.php">Profile</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<section class="banner-area relative">
    <div class="container" id="cont2">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Teacher Profile
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="teacher_dashboard.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="teacher_profile.php">Profile</a>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section>
<div id="notheader">
<h1 class="text-white pt-3">Teacher Profile</h1>
<div class="container profile">
    <div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-img">
					<img src="images/anonymous-user-circle-icon-vector-18958255.jpg"alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        <h5 class="text-info text-center"><?php echo $name;?></h5>
					</div>
				</div>
                <div class="card-body">
                <div class="profile-userbuttons">
					<a type="button" class="btn btn-danger btn-sm" href="../signin.php">Sign-Out</a>
				</div>
                </div>
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
					<form method="post" class="border border-0 p-5">
					    <label for="title">Teacher Id</label>
                        <input type="text" disabled class="form-control mb-4" value="<?php echo $id;?>">

                        <label for="title">Teacher Name</label>
                        <input type="text" disabled class="form-control mb-4" value="<?php echo $name;?>">

                        <label for="title">Teacher Email</label>
						<input type="email" name="email" class="form-control mb-4" value="<?php echo $email?>">

                        <label for="title">Change Password</label>
						<input type="password" class="form-control mb-4" name="pwd" value="<?php echo $pwd;?>">

                        <label for="title">Change Address</label>
						<input type="text" class="form-control mb-4" name="addr" value="<?php echo $addr;?>">

                        <label for="title">Change Phone No.</label>
						<input type="text" class="form-control mb-4" name="phn" value="<?php echo $phn;?>">

                        <label for="title">Courses</label><br>
						Courses: 1. <?php echo $c1;?><br>
						Courses: 2. <?php echo $c2;?><br>
						Courses: 3. <?php echo $c3;?><br><br>
						<input class="btn btn-info" type="submit" value="Update" name="update">
					</form>
            </div>
		</div>
	</div>
</div>
<br>
<br>
</div>
</body>
</html>