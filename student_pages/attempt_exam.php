<?php
$conn = mysqli_connect("localhost", "root", "", "iwp_proj");
session_start();
$studid=$_SESSION['studid'];
if(isset($_GET['get'])){
    $examid=$_GET['get'];
}
$res2=mysqli_query($conn,"select * from exams where exam_id='$examid'");
while ($row2=mysqli_fetch_array($res2)){
    $exam_name=$row2['exam_name'];
    $description=$row2['description'];
    $teacherid=$row2['teacher_email'];
}
?>
<html lang="en">
<head>
    <title>Exam</title>
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
    <script src="js/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <style>
        .card-header{
            background: linear-gradient(to right, orangered 0%, orange 100%);
            color: white;
        }
        .container{
            padding: 20px;
            border: none;
        }
        ol, ul {
            list-style: none;
        }
        #question{
            background: linear-gradient(to right, #9900cc 0%, #ff6666 100%);

        }
        .card-body{
            border: #660066 2px solid;
        }
        card{
            height: 350px;
            border-radius: 10px;
            width: 800px;
            border: none;
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
    </style>
</head>
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
                    <?php echo $exam_name?>
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="exams.php">Exams</a><i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <a href="attempt_exam.php"><?php echo $exam_name?></a>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section>
<body>
<div class="container">
    <h5>Description: <i><?php echo $description?></i></h5><br><br>
    <form method="post">
    <?php
    $res=mysqli_query($conn, "Select * FROM exam_questions where examid=$examid" );
    while($row=mysqli_fetch_array($res)) {
        $qno = $row['ques_table_id'];
        $ques = $row['question'];
        $ch1 = $row['choice1'];
        $ch2 = $row['choice2'];
        $ch3 = $row['choice3'];
        $ch4 = $row['choice4'];
        $correct_ans=$row['correct_choice'];
        $marks = $row['marks'];
        $i=1;
        ?>
        <div class="card">
            <div class="card-header pt-3">
                <h4><?php echo $ques?></h4>
            </div>
            <div class="card-body pt-3">
            <h5 class="text-info">a)&nbsp;&nbsp;<input name="ans[<?php echo $qno?>][correct]" value="<?php echo $ch1?>" type="radio">&nbsp;<label class="text-info"><?php echo $ch1?></label></h5>
            <h5 class="text-info">b)&nbsp;&nbsp;<input name="ans[<?php echo $qno?>][correct]" value="<?php echo $ch2?>" type="radio">&nbsp;<label class="text-info"><?php echo $ch2?></label></h5>
            <h5 class="text-info">c)&nbsp;&nbsp;<input name="ans[<?php echo $qno?>][correct]" value="<?php echo $ch3?>" type="radio">&nbsp;<label class="text-info"><?php echo $ch3?></label></h5>
            <h5 class="text-info">d)&nbsp;&nbsp;<input name="ans[<?php echo $qno?>][correct]" value="<?php echo $ch4?>" type="radio">&nbsp;<label class="text-info"><?php echo $ch4?></label></h5>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
            foreach($_POST['ans'][$qno] as $answer){
                $res3=mysqli_query($conn,"insert into exam_attempts (exam_id,ques_id,tch_id,stud_id,user_ans,correct_choice,marks) 
                                                values ('$examid','$qno','$teacherid','$studid','$answer','$correct_ans','$marks')");
                if($res3){
                    echo "<script>swal(\"Success\",\"Test Submitted Successfully!\", \"success\");</script>";
                }
                else{
                    echo "<script>swal(\"Error\",\"Test not submitted!\", \"error\");</script>";
                }
            }
        }
    }
        ?>
        <br>
        <input class="btn btn-info" type="submit" name="submit" value="submit">
    </form>
</body>
</html>
