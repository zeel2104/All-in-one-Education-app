<?php
$conn=mysqli_connect("localhost","root","","iwp_proj");
session_start();
$tid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
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
    <script src='fullcalendar-5.3.2/lib/main.js'></script>
    <style>
        #calendar-bg-events{
            background-color: black;
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
                events: 'load.php',
                selectable:true,
                selectHelper:true,
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                        $.ajax({
                            url: 'add-event.php',
                            data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "POST",
                            success: function (data) {
                                displayMessage("Added Successfully");
                            }
                        });
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true
                        );
                    }
                    calendar.fullCalendar('unselect');
                },
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
<body style="background-image: url('cccccc.jpeg'); padding: 20px;">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
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
                        <input class="btn btn-success" type="submit" name="submit" value="Add">

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="text-center" style="float: right; margin: 30px;">
    <a href="" class="btn btn-primary btn-rounded mb-4 " data-toggle="modal" data-target="#modalLoginForm">+ Add Task</a>
</div>
<?php
if(isset($_POST["submit"]))
{
    $task= $_POST['task'];
    $start_event= $_POST['start'];
    $end_event=$_POST['end'];
    $result2= mysqli_query($conn, "Insert into teachers_todo_list (teacher_email,task,start_date,due_date) Values ('$tid','$task','$start_event','$end_event')");
    if($result2){
        echo "success";
    }
    else{
        echo "not success";
    }

}
?>
<div class="container" style="background-color: whitesmoke; opacity: 80%; padding: 10px; margin-top: 100px;">
    <div id="calendar"></div>
</div>
</body>
</html>
