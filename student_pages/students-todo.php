<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$studid=$_SESSION['studid'];
$res2=mysqli_query($conn,"select * from student_info where st_mail='$studid'");
while ($row2=mysqli_fetch_array($res2)){
    $stud_id=$row2['st_regno'];
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
        <link href='fullcalendar/main.css' rel='stylesheet' />
        <script src='fullcalendar/lib/main.js'></script>
        <style>
            #calendar-bg-events{
                background-color: black;
            }
            body{
                background: linear-gradient(to right, #63579f 0%, #544895 100%);
            }
            .banner-area{
                background-image: url("img/banner-bg.png");
                height: 20%;
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
            #notheader{
                padding: 20px;
            }
        </style>
        <script>
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    editable:true,
                    themeSystem: 'bootstrap',
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    weekNumbers: true,
                    dayMaxEvents: true,
                    events: 'load.php',
                    selectable:true,
                    selectHelper:true,
                    eventResize:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id, color:'red'},
                            success:function(){
                                calendar.fullCalendar('refetchEvents');
                                alert('Event Update');
                            }
                        })
                    },

                    eventDrop:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated");
                            }
                        });
                    },

                    eventClick:function(event)
                    {
                        if(confirm("Are you sure you want to remove it?"))
                        {
                            var id = event.id;
                            $.ajax({
                                url:"load.php",
                                type:"POST",
                                data:{id:id},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Removed");
                                }
                            })
                        }
                    },

                });
            });

        </script>
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
                        Tasks
                    </h1>
                    <div class="link-nav">
						<span class="box">
							<a href="stud_dash.php">Home </a><i class="fa fa-chevron-left" aria-hidden="true"></i>
							<a href="students-todo.php">Tasks</a>
						</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="rocket-img">
            <img src="img/rocket.png" alt="">
        </div>
    </section>
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <form method="post">
                            <label data-error="wrong" data-success="right"><i class="fa fa-question-circle" aria-hidden="true"></i> Task</label>
                            <input type="text" name="task" id="task" class="form-control validate"><br>
                            <label data-error="wrong" data-success="right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Start date</label>
                            <input type="datetime-local" name="start" id="startdate" class="form-control validate"><br>
                            <label data-error="wrong" data-success="right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> End date</label>
                            <input type="datetime-local" name="end" id="startdate" class="form-control validate"><br>
                            <input class="btn btn-success" type="submit" name="addtask" value="Add">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="notheader">
        <div class="text-center" style="float: left;">
            <a href="" class="btn btn-primary btn-rounded mb-4 " data-toggle="modal" data-target="#modalLoginForm">+ Add Task</a>
        </div><br><br><br>
    <?
    $res3=mysqli_query($conn,"select * from students_todo_list where st_mail='$studid'");
    while($row3=mysqli_fetch_array($res3)){
        $taskname=$row3['task'];
        $res=mysqli_query($conn,"SELECT ac.courses, ex.duedate, ex.created, ex.exam_name, ex.description, ex.timelimit, ex.status
                                from academics ac left join exams ex on ac.teacher_id=ex.teacher_email 
                                where ac.st_id='$stud_id' and ex.exam_id is not null");
    while($row=mysqli_fetch_array($res)){
        $examname=$row['exam_name'];
        $startdate=$row['created'];
        $duedate=$row['duedate'];
        if($examname!=$taskname){
             $res4=mysqli_query($conn,"insert into students_todo_list (st_mail,task,start_date,due_date) 
                                    values ('$studid','$examname','$startdate','$duedate')");
        if($res4){
            echo "yes";
        }
        else{
            echo "no";
        }
        }


    }

    }
    if(isset($_POST["addtask"]))
    {
        $task= $_POST['task'];
        $start_event= $_POST['start'];
        $end_event=$_POST['end'];
        $result2= mysqli_query($conn, "Insert into students_todo_list (st_mail,task,start_date,due_date) Values ('$studid','$task','$start_event','$end_event')");
        if($result2){
            echo "success";
        }
        else{
            echo "not success";
        }

    }
    ?>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Tasks For This Month</h4>
                </div><br>
                <div class="container" >
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Task List</h5>
                </div>
                <div class="list-group">
                    <ul style="list-style: none">
                    <?php
                    $res5=mysqli_query($conn,"select * from students_todo_list where st_mail='$studid'");
                    while($row5=mysqli_fetch_array($res5)){
                        $todo=$row5['task'];
                        $duedate=$row5['due_date'];
                        ?>
                        <li class="list-group-item list-group-item-action text-primary"><?php echo $todo?></li>
                        <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
    </html>
<?php
