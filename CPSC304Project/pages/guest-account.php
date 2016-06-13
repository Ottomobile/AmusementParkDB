<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Account</title>
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
                    <li class="active">
                        <a href="guest-account.php">Guest</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 id="header-1">Guest Account</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <form role="form" id="form-background" method="post">
                <?php
                    echo "<p id='p-label'>Login Successful!</p>";
                    echo "<p id='p-label'>Successfully logged in as ".$_SESSION['loggedInUser'][0]." ".$_SESSION['loggedInUser'][1].".</p>";
                    echo "<br>
                            <div class='btn-group-vertical'>
                                <a class='btn btn-primary' href='guest-edit.php'>Edit account details</a>
                                <br>
                                <a class='btn btn-default' href='guest-load.php'>Load account balance</a>
                                <br>
                                <a class='btn btn-default' href='guest-ride.php'>Visit ride</a>
                                <br>
                                <a class='btn btn-default' href='guest-game.php'>Play game</a>
                                <br>
                                <a class='btn btn-danger' href='guest-delete.php'>Delete account</a>
                            </div>";
                ?>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>