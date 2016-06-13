<?php
    session_start();
    $usertype = "none";
    if($_SESSION['loggedInUser']){
        $usertype = $_SESSION['loggedInUser'][0];
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Home</title>
</head>
<body style="background-image:url('../images/AmusementPark-1.jpg'); background-size:100%; background-repeat:no-repeat">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Team Supreme</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                        if($usertype == "guest"){
                            echo "<li><a href='guest-account.php'>Guest</a></li>";
                        }
                        elseif($usertype == "employee"){
                            echo "<li><a href='employee-account.php'>Employee</a></li>";
                        }
                        elseif($usertype == "manager"){
                            echo "<li><a href='manager-account.php'>Employee</a></li>";
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($usertype == "none"){
                        echo "<li><a href='guest_registration_front.php'><span class='glyphicon glyphicon-user'></span>&nbsp;Guest Registration</a></li>";
                        echo "<li><a href='loginFront.php'><span class='glyphicon glyphicon-log-in'></span>&nbsp;Login</a></li>";
                    }
                    else{
                        echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span>&nbsp;Log Out</a></li>";
                    }
                    ?>                                               
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
                $connection = mysql_connect("localhost", "root", "") or die("Couldn't connect to the database!");
                mysql_select_db("amusement_park", $connection) or die("Couldn't connect to the database!");
                echo "<h1 id=\"header-1\">Welcome to our amusement park!</h1>";                
                echo "<h1 id=\"header-1\">Connected to database...</h1>";
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <a class="btn btn-default" href="reset.php">Reset database</a>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>

</body>
</html>