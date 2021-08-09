<!DOCTYPE html>
<html lang="en">
<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$studid=$_SESSION['studid'];
$get=mysqli_query($conn,"select * from student where st_mail='$studid'");
while ($row2=mysqli_fetch_array($get)){
    $stud_id=$row2['st_regno'];
    $st_name=$row2['st_name'];
    $st_addr=$row2['st_address'];
    $phhno=$row2['st_pno'];
    $st_pass=$row2['st_pass'];
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
                    Student Profile
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="student_profile.php">Profile</a>
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
    <h1 class="text-white pt-3">Student Profile</h1>
    <div class="container profile">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img">
                        <img src="images/student.jpg"alt="">
                    </div>
                    <div class="profile-usertitle"  style="padding: 10px">
                        <div class="profile-usertitle-name">
                            <h5 class="text-info text-center"><?php echo $st_name;?></h5>
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
                        <label for="title">Student Registration Number</label>
                        <input type="text" disabled class="form-control mb-4" value="<?php echo $stud_id;?>">

                        <label for="title">Student Name</label>
                        <input type="text" disabled class="form-control mb-4" value="<?php echo $st_name;?>">

                        <label for="title">Student Email</label>
                        <input type="email" disabled name="email" class="form-control mb-4" value="<?php echo $studid?>">

                        <label for="title">Password</label>
                        <input type="password" class="form-control mb-4" name="pwd" value="<?php echo $st_pass;?>">

                        <label for="title">Address</label>
                        <input type="text" class="form-control mb-4" name="addr" value="<?php echo $st_addr;?>">

                        <label for="title">Phone No.</label>
                        <input type="text" class="form-control mb-4" name="phn" value="<?php echo $phhno;?>">

                        <label for="title">Courses</label><br>
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th class="text-info">Course Name</th>
                            <th class="text-info">Registered Under</th>
                            </thead>
                        <?php
                        $res3=mysqli_query($conn,"Select * from academics where st_id='$stud_id'");
                        $i=1;
                        while($row3=mysqli_fetch_array($res3)){
                            $course=$row3['courses'];
                            $teacher_registered=$row3['teacher_id'];
                            ?>
                                <tr>
                                    <td class="text-primary"><?php echo $i;?></td>
                                    <td><?php echo $course;?><br></td>
                                    <td><?php echo $teacher_registered?></td>
                                </tr>
                        <?php
                            $i++;
                        }
                        ?>
                        </table>
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
