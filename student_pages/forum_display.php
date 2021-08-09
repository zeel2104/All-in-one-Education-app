<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
if(isset($_GET["get"])){
    $id=$_GET["get"];
}
else {
    if (isset($_GET['forumid'])) {
        $id = $_GET['forumid'];
        echo $id;
    }
}
if(isset($_GET["delete"])){
    $post = $_GET["delete"];
    echo $post;
    $delexam=mysqli_query($conn, "DELETE FROM forum_posts WHERE postid='$post}'" );
    if($delexam){
        echo "successfully deleted";
    } else {
        echo "Failed to delete exam";
    }
}

if (isset($_GET['reply'])) {
    $replid=$_GET['reply'];
}

$studid=$_SESSION['studid'];
?>

<html lang="en">
<head>
    <title>forum</title>
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
        .comment-wrapper{
            background-color: white;
            padding: 10px;
            border-top: orangered 10px solid;
            border-radius: 8px;
        }
        .comment-wrapper .panel-body {
            max-height:650px;
            overflow:auto;
        }

        .comment-wrapper .media-list .media img {
            width:64px;
            height:64px;
        }

        .comment-wrapper .media-list .media {
            border-bottom:1px dashed #efefef;
            margin-bottom:10px;
            padding: 8px;
        }
    </style>
</head>
<?php
$res1=mysqli_query($conn,"Select * from forum where forumid='$id'");
while ($rows=mysqli_fetch_array($res1)){
    $topic=$rows['forum_topic'];
}
?>
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
                                <a class="dropdown-item" href="new_assignment.php">Upload Assignments</a>
                            </div>
                        <li class="nav-item">
                            <a class="nav-link" href="forum.php">Forums</a>
                        </li>
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
                    Assignments
                </h1>
                <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="courses.php">Assignments</a>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section><br>
<body>
<div class="container">
<form method="post">
    <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" name="posts" rows="3" placeholder="Type your message here..."></textarea>
    <br>
    <input type="submit" class="btn btn-success pull-left" name="post" value="Post">
</form>
</div>
<br><br>
<?php $res=mysqli_query($conn,"Select * from forum_posts where forumid='$id'");
while ($row=mysqli_fetch_array($res)){
$topic=$row['topic'];
$post=$row['post'];
$by=$row['posted_by'];
$time=$row['posted_on'];
?>
<div class="container">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <?php
                        if($by==$studid){
                        ?>
                        <h5>Post <?php echo "<button class='btn btn-danger pull-right'><a style='color: white' href='forum_display.php?delete=".$row["postid"]."&forumid=".$id."'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></button>"?></h5>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <hr>
                        <ul class="media-list">
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img class="rounded-circle" src="https://bootdey.com/img/Content/user_1.jpg" alt="">&nbsp;&nbsp;
                                </a>
                                <div class="media-body">
                                <span class="text-muted pull-right">
                                    <h5 class="text-muted"> <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time?></h5>
                                </span>
                                    <strong class="text-success"><?php echo $by?></strong>
                                    <p>
                                        <?php echo $post?>
                                    </p>
                                    <hr>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<br>
<?php
}
if(isset($_POST['post'])){
    $post=$_POST['posts'];
    $result=mysqli_query($conn,"Insert into forum_posts (forumid,topic,post,posted_by) values ('$id','$topic','$post','$studid')");
    if($result){
        echo "inserted";
        echo "<meta http-equiv=\"refresh\" content=\"1\">";
    }
    else{
        echo "no";
    }
}

?>
<div class="container">
</div>

</body>
</html>
