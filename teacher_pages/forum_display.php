<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
if(isset($_GET["get"])){
    $id=$_GET["get"];
}
if(isset($_GET["delete"])){
    $post_name = $_GET["delete"];
    $delexam=mysqli_query($conn, "DELETE FROM forum_posts WHERE postid='$post_name'" );
    if($delexam){
        echo "successfully deleted";
    } else {
        echo "Failed to delete exam";
    }
}
$name=$_SESSION['userid'];
?>

<html>
<head>
    <title>Create forum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<style>
    .jumbotron-fluid{
        background-color: seagreen;
    }
    .jumbotron-fluid a, .jumbotron-fluid h1{
        color: white;
    }
    body{
        background-image: url("cccccc.jpeg");
        background-position-y: bottom;
        padding: 8px;
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
<?php
$res1=mysqli_query($conn,"Select * from forum where forumid='$id'");
while ($rows=mysqli_fetch_array($res1)){
    $topic=$rows['forum_topic'];
}
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"><b><?php echo $topic?></b></h1 class="display-4"><br><br>
        <h3><a href="forum.php"><i class="fa fa-chevron-left" aria-hidden="true">  Forums</i></a></h3>
    </div>
</div>
<body>
<div class="container">
<form method="post" name="form1" id="form1">
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
                        <h5>Post <?php echo "<button class='btn btn-danger pull-right'><a style='color: white' href='forum_display.php?delete=".$row["postid"]."'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i> Delete</a></button>"?></h5>

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
                                    <button onclick="Openform()" class="btn btn-info">Reply</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
<br>
<script>
    function Openform()
    {
        document.getElementById('form1').style.display = '';
    }
    function reply() {
        var text=prompt("enter Your reply","");
        document.getElementById("reply").innerHTML=text;
    }
</script>
</body>
<?php
}
if(isset($_POST['post'])){
    $post=$_POST['posts'];
    $result=mysqli_query($conn,"Insert into forum_posts (forumid,topic,post,posted_by) values ('$id','$topic','$post','$name')");
    if($result){
        echo "inserted";
        echo "<meta http-equiv=\"refresh\" content=\"2\">";
    }
    else{
        echo "no";
    }
}

?>
</html>
