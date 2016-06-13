<?php
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Add Employee Status</title>
</head>
<body style="background-image:url('../images/AmusementPark-4.jpg'); background-size:100%; background-repeat:repeat-y">
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
                    <li>
                        <a href="manager-account.php">Manager</a>
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
            <h1 id="header-1">Add Employee Status</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <form role="form" id="form-background">
                <p id="p-label">Add Employee Status</p>
                <a class="btn btn-default" href="manager-account.php">Account Home</a>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>