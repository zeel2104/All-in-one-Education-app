<?php
$conn = mysqli_connect("localhost", "root", "", "iwp_proj");
session_start();
$studid=$_SESSION['studid'];
if(isset($_GET['get'])){
    $examid=$_GET['get'];
}
$res=mysqli_query($conn,"select * from exam_attempts where exam_id='$examid' and stud_id='$studid'");
$total_ques=mysqli_num_rows($res);
$total=0;
$total_marks=0;
$correct=0;
while($row=mysqli_fetch_array($res)){
    $marks=$row['marks'];
    if($row['user_ans']==$row['correct_choice']){
        $total=$total+$marks;
        $correct++;
    }
    else{
        $total=$total+0;
    }
    $total_marks+=$marks;
}
$incorrect=$total_ques-$correct;
$percentage=($total*100)/$total_marks;
$res3=mysqli_query($conn,"select * from exams where exam_id='$examid'");
while($row3=mysqli_fetch_array($res3)){
    $subject=$row3['coursename'];
    $exam_name=$row3['exam_name'];
    $teacher_id=$row3['teacher_email'];
}
$res5=mysqli_query($conn,"select * from student_report where exam_id='$examid' and stud_id='$studid'");
$cnt=mysqli_num_rows($res5);
if($cnt==0) {
    $res2 = mysqli_query($conn, "insert into student_report (exam_id,course,exam_name,marks_scored,total_marks,percentage,stud_id,teacher_id)
                                values ('$examid','$subject','$exam_name','$total','$total_marks','$percentage','$studid','$teacher_id')");
}
?>
<html>
<head>
    <title>Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Correct Answers', <?php echo $correct?>],
                ['Wrong Answers', <?php echo $incorrect?>]
            ]);
            var options = {'title':'Correct Incorrect Ratio',
                'width':600,
                'height':400
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <style>
        .card{
            padding: 20px;
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
                    <?php echo $exam_name?> Results</a>
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="courses.php">Exams</a><i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <a href="courses.php"><?php echo $exam_name?> Results</a>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section>
<div class="row">
    <div class="col-lg-6">
        <div class="card" style="height: 400px;">
            <div id="chart_div"></div>
        </div>
    </div>
    <div class="col-lg-6 pt-3">
        <div class="card" style="background-color: white; height: 300px; padding: 10px;">
            <h3>Exam Report</h3><br>
            <h5>Total number of questions: <?php echo $total_ques?></h5>
            <h5>Number of questions correctly answered: <?php echo $correct?></h5>
            <h5>Number of questions incorrectly answered: <?php echo $incorrect?></h5>
            <h5>Marks: <?php echo $total?>/<?php echo $total_marks?></h5>
            <h5>Percentage secured: <?php echo $percentage?>%</h5>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Review</h4>
            </div>
            <div class="card-body">
        <?php
        $icon['correct']='<i style="color: mediumseagreen" class="fa fa-check" aria-hidden="true"></i>';
        $icon['wrong']='<i style="color: red" class="fa fa-times" aria-hidden="true"></i>';
        $res4=mysqli_query($conn,"SELECT ex.question, att.correct_choice, att.user_ans,att.marks from exam_questions ex 
                                        left join exam_attempts att on ex.ques_table_id=att.ques_id
                                        where ex.examid='$examid' and att.stud_id='$studid' group by att.correct_choice;");
        while($row4=mysqli_fetch_array($res4)){
            $ans= $row4['user_ans'];
            $correct=$row4['correct_choice'];
            $marks=$row4['marks'];
            if($ans==$correct){
                $msg="correct";
                $scored=$marks;
            }
            else{
                $msg="wrong";
                $scored=0.00;
            }
            ?>
            <h5 class="text-info">Question: <?php echo $row4['question'];?></h5>
            <h6>Your Answer: <?php echo $row4['user_ans']." ".$icon[$msg];?></h6>
            <h6>Marks scored: <?php echo $scored?></h6>
            <h6 class="text-primary">Correct answer: <?php echo $row4['correct_choice']?></h6><hr>
        <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
