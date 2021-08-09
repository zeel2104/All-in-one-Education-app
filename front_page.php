<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>front page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        .jumbotron-fluid{
            background-image: url("common_images/homepagepng.png");
            height: 600px;
            padding:100px;
            text-align: left;
        }
        .scrolling-navbar{
            background-color:transparent;
            font-size: 24px;
            height: 70px;
        }
        h1{
            color: white;
            text-align: left;
            font-size: 100px;
        }
        .btn{
            border-radius: 50px;
            width: 300px;
            height: 80px;
            background: linear-gradient(to right, #ffff00 0%, #ff9933 100%);
            color: midnightblue;
            font-size: 34px;
        }
        li{
            margin-left: 10px;
            color: white;
        }
        button{
            width: 120px;
            height: 50px;
            margin: 10px;
            float: right;
            border-radius: 30px;
            border: none;
            background: linear-gradient(to right, #ffff00 0%, #ff9933 100%);
            color: midnightblue;
        }
        .edukit{
            font-size: 80px;
            color:white;
        }
        .media{
            height: 400px;
            font-size: 30px;
            padding: 100px;
        }
        .page-footer{
            background-color: midnightblue;
            color: white;
        }
        .scrolling-navbar img{
            top:10px;
            margin-top: 10px;
            width:200px;
            height: 70px;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar">
        <img src="common_images/edukitlogo.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="front%20page.html" style="color: white"><b>Home</b> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <a id="bright" onclick="lightmode()" style="float: right; color: black; font-size: 30px"><i class="fa fa-sun-o"></i>&nbsp;&nbsp</a>
            <a id="dark" onclick="darkmode()" style="float: right; color:black; font-size: 30px"><i class="fa fa-moon-o"></i></a>
            <button><a href="signin.php"> <b>Sign In</b></a></button>
        </div>
    </nav>
</header>
<div id="top">
<div class="jumbotron-fluid">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">
            <h1 class="card-title h2 my-4 py-2">Enhance your<br> Online Learning Experience<br> with </h1>
            <h1 class="edukit">Edukit</h1>
        </div>
    </div>
</div>
</div>
<div class="media">
    <img class="d-flex mr-3" src="common_images/boy.png" alt="Generic placeholder image">
    <div class="media-body">
        <h3 class="mt-0 mb-1 font-weight-bold">Easily organised</h3>
       Make online learning fun by getting everything organised. Easy to manage all your classwork and homework materials. All in one single place. Our all-in-one education system aims to combine all the functionalities that are possible physically. This facility provides in smooth functioning of education online.
    </div>
</div>
<div class="media" style="height: 500px">
    <div class="media-body">
        <h3 class="d-flex mr-3 font-weight-bold">For Both Teachers and Students</h3>
        While there are many web apps available to take virtual classes, there are very few web apps to access the contents uploaded by teachers for student’s reference, video lectures in recorded forms and quiz platforms available to both the student and teachers.
    </div>
    <img class="mt-0 mb-1" src="common_images/teacherstudent.png" alt="Generic placeholder image" height="400px" width="400px">
</div>
<br>
<footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center text-md-left">
        <div class="row">

            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase">EduKit</h5>
                <p>Your best friend in Online Classes</p>
            </div>

            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">

                <h5 class="text-uppercase">More About Us</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">About Us</a>
                    </li>
                    <li>
                        <a href="#!">Contact Us</a>
                    </li>
                </ul>

            </div>

        </div>

    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright: EduKit
    </div>

</footer>
<script>
    function darkmode() {
        document.body.style.backgroundColor="#000d1a";
        document.body.style.color='white';
        document.getElementById("dark").style.color="white";
        document.getElementById("bright").style.color="white";
    }
    function lightmode() {
        document.body.style.backgroundColor='white';
        document.getElementById("bright").style.color="black";
        document.getElementById("dark").style.color="black";
        document.body.style.color='black';

    }
</script>
</body>
</html>