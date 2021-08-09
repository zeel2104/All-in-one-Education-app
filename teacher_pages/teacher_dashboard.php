<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$tid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
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
        .banner-content{
            margin-top: 200px;
            color: white;
        }
        .home-banner-area{
            background-image: url("img/header-bg2.png");
            background-repeat: no-repeat;
            position: center;
            height:500px;
            width:100%
        }
        nav{
            background-color: black;
            opacity: 85%;
        }
        a{
            font-size: 20px;
        }
        .card-counter{
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i{
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
        }
        .card{
            box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
            padding: 30px;
        }
    </style>
</head>
<body>
<?php
$result=mysqli_query($conn, "Select * from teachers where tch_email='$tid'");
while($row= mysqli_fetch_array($result)){
    $name=$row['tch_name'];
    $email=$row['tch_email'];
}
$today_date=date("Y-m-d h:i:sa");
$sql=mysqli_query($conn,"select * from teachers_todo_list where due_date>='$today_date' and teacher_email='$tid'");
$tasks=mysqli_num_rows($sql);


$res2=mysqli_query($conn, "select * from academics where teacher_id='$tid'");
$students=mysqli_num_rows($res2);

$res3=mysqli_query($conn,"select * from exams where teacher_email='$tid'");
$exams=mysqli_num_rows($res3);
?>
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
<section class="home-banner-area relative">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-8 col-md-12">
                <h1>Welcome, <?php echo $name;?> </h1>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section><br>
<div class="container">
    <div class="row">
        <div class="col-lg-3" style=" ]height: 200px">
            <div class="card card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers"><?php echo $tasks?></span>
                <span class="count-name">Pending Tasks</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-counter danger">
                <i class="fa fa-users"></i>
                <span class="count-numbers"><?php echo $students?></span>
                <span class="count-name">Students</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers">3</span>
                <span class="count-name">Courses</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-counter info">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers"><?php echo $exams?></span>
                <span class="count-name">Exams</span>
            </div>
        </div>
    </div>
</div>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/owl-carousel-thumb.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
</body>

</html>
