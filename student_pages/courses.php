<html>
<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$studid=$_SESSION['studid'];
?>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
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
        .content {
            background-color: whitesmoke;
            padding: 10px;
            width: 87%;
            height: 100%;
            margin: 10px;
            box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
        }
        img{
            width: 100%;
            height: 250px;
        }
        #notheader{
            padding: 50px;
        }
    </style>
</head>
<?php
$res=mysqli_query($conn,"Select * from student where st_mail='$studid'");
while($row=mysqli_fetch_array($res)){
    $course1=$row['st_course1'];
    $course2=$row['st_course2'];
    $course3=$row['st_course3'];
    $course4=$row['st_course4'];
    $course5=$row['st_course5'];
    $course6=$row['st_course6'];
}
$result=mysqli_query($conn,"Select * from courses where st_mail='$studid'");
while($row=mysqli_fetch_array($res)){

}
?>
<body>
<header id="header">
    <div class="container">
        <div class="row pull-right">
            <div id="logo">
            </div>
            <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                    <ul class="navbar-nav mr-auto pull-left">
                        <li class="nav-item active">
                            <a class="nav-link" href="stud_dash.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="get-events.php">Tasks</a>                                                                                                                                                                                                                             </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Courses</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Exams
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <!--    <a class="dropdown-item" href="#">New Exam</a>
                                <a class="dropdown-item" href="#">Manage Exam</a>
                                <a class="dropdown-item" href="#">Exam History</a>-->
                                <a class="dropdown-item" href="#">Attempt Exam</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Assignments
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="#">Upload Assignments</a>
                                <a class="dropdown-item" href="#">View Assignments</a>
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
                                <a class="dropdown-item" href="#">Logout</a>
                                <a class="dropdown-item" href="#">Profile</a>
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
                    Courses
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="courses.php">Courses</a>
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
<h1>Course Overview</h1>
<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <div class="content">
            <div class="card-img">
                <img src="img/c1.jpg" alt="Mountains"><br>
            </div>
            <div class="card-title">
                <h2><a href="course1.php"> <?php echo $course1?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div><br>
    <div class="col-md-4 col-md-offset-2">
        <div class="content">
            <div class="card-img">
                <img src="img/c2.jpg" alt="Mountains"><br>
            </div>
            <div class="card-title">
                <h2><a href="course1.php"> <?php echo $course2?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div><br>
    <div class="col-md-4 col-md-offset-2">
        <div class="content">
            <div class="card-img">
                <img src="img/c3.jpg" alt="Mountains"><br>
            </div>
            <div class="card-title">
                <h2><a href="course1.php"> <?php echo $course3?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div><br>
      <div class="col-md-4 col-md-offset-2">
        <div class="content">
            <div class="card-img">
                <img src="img/c4.jpg" alt="Lights"><br>
            </div>
            <div class="card-title">
                <h2><a href="course2.html"> <?php echo $course4?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-2">
        <div class="content">
            <div class="card-img">
                <img src="img/c5.jpg" alt="Lights"><br>
            </div>
            <div class="card-title">
                <h2><a href="course2.html"> <?php echo $course5?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  <div class="col-md-4 col-md-offset-2"> 
        <div class="content">
            <div class="card-img">
                <img src="img/c6.jpg" alt="Lights"><br>
            </div>
            <div class="card-title">
                <h2><a href="course2.html"> <?php echo $course6?></a></h2>
            </div><hr>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td> <h5>Students Registered</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'students_registered.php'">View</button></h5></td>
                    </tr>
                    <tr>
                        <td> <h5>Upload class materials</h5></td>
                        <td> <button class="btn btn-primary pull-right" onclick="location.href = 'course1.php'">View</button></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>