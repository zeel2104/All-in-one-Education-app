<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$studid=$_SESSION['studid'];
$res2=mysqli_query($conn,"select * from student_info where st_mail='$studid'");
while ($row2=mysqli_fetch_array($res2)){
    $stud_id=$row2['st_regno'];
}
if(isset($_GET['cname'])){
    $course=$_GET['cname'];
}
$res3=mysqli_query($conn,"select * from courses where course_name='$course'");
while($row3=mysqli_fetch_array($res3)){
    $modules=$row3['chapters'];
}
?>
<html lang="en">
<head>
    <title>Course Materials</title>
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

        img{
            width: 100%;
            height: 250px;
        }
        #notheader{
            padding: 50px;
        }
        .card{
            background-color: whitesmoke;
            height: 100%;
            box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
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
                            <a class="nav-link" href="stud_dash.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students-todo.php">Tasks</a>                                                                                                                                                                                                                             </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">Courses</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Exams
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="exams.php">Exams</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Assignments
                            </a>
                            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="assignments.php">Assignments</a>
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
                                <a class="dropdown-item" href="logout.php">Logout</a>
                                <a class="dropdown-item" href="student_profile.php">Profile</a>
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
                    Course Materials
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="courses.php">Courses</a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="course_materials.php">Courses Materials</a>
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
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Course Details</h4>
                </div>
                   <?php
                   $res3=mysqli_query($conn,"Select * from courses where course_name='$course'");
                   while($row3=mysqli_fetch_array($res3)){
                       $courseid=$row3['courseid'];
                       $module=$row3['chapters'];
                   }
                   $res4=mysqli_query($conn,"select * from class_materials where coursename='$course'");
                   $progress=mysqli_num_rows($res4);
                   $perc=($progress*100)/$module;
                   ?>
                <div class="card-body">
                <h5 class="text-primary">Course Id <?php echo $courseid?></h5><hr>
                <h5 class="text-dark">Course Name <?php echo $course?></h5><hr>
                <h5 class="text-dark">Modules <?php echo $module?></h5><hr>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $perc?>%" aria-valuenow="<?php echo $progress?>" aria-valuemin="0" aria-valuemax="<?php echo $module?>"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="card-header">
                    <h2 class="text-info">Class Materials For <?php echo $course?></h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <?php
                            $res=mysqli_query($conn,"Select * from class_materials where coursename='$course' order by module ");
                            while($row=mysqli_fetch_array($res)){
                                $coursename=$row['coursename'];
                                $fname=$row['file'];
                                $module_no=$row['module'];
                                $uploaded_on=$row['uploaded_on'];
                                $files = scandir("../teacher_pages/uploads");
                                for ($a = 2; $a < count($files); $a++) {
                                    if ($files[$a] == $fname) {
                                        ?>
                                        <td class="text-primary"><h5>Module <?php echo $module_no?></h5></td>
                                        <td> <h5><a download="<?php echo $files[$a] ?>" href="../teacher_pages/uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a></h5></td>
                                        <td><h5>Uploaded: <?php echo $uploaded_on?></h5></td>
                        </tr>
                                        <?php
                                    }}}
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
