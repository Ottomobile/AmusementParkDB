<?php
    session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body style="background-image:url('../images/AmusementPark-2.jpg'); background-size:100%; background-repeat:repeat-y">
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
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="guest_registration_front.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Guest Registration</a></li>
                    <li class="active"><a href='loginFront.php'><span class='glyphicon glyphicon-log-in'></span>&nbsp;Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 id="header-1">Login</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="loginBack.php" id="form-background" method="post">
                <div class="form-group">
                    <label for="nameField">Name:</label>
                    <input name="name" type="text" class="form-control" id="nameField" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="password" type="password" class="form-control" id="pwd" placeholder="Password" required />
                </div>
                <div class="radio">
                    <p id="p-label">User Type:</p>
                    <label>
                        <input type="radio" name="usertype" value="guest" required />Guest
                    </label>
                    <br />
                    <label>
                        <input type="radio" name="usertype" value="employee" />Employee
                    </label>
                    <br />
                    <label>
                        <input type="radio" name="usertype" value="manager" />Manager
                    </label>
                    <br />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>
