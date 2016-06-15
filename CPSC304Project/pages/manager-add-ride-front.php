<?php
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Add Ride</title>
</head>
<body style="background-image:url('../images/AmusementPark-3.jpg'); background-size:100%; background-repeat:repeat-y">
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
            <h1 id="header-1">Add Ride</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="manager-add-ride-back.php" id="form-background" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" />
                </div>
                <div class="form-group">
                    <label for="capacity">Capacity:</label>
                    <input name="capacity" type="number" min="0" class="form-control" id="capacity" placeholder="Capacity" />
                </div>
                <div class="form-group">
                    <label for="gpslocation">GPS Location:</label>
                    <input name="gpslocation" type="text" class="form-control" id="gpslocation" placeholder="123.1234,123.1234" />
                </div>
                <div class="form-group">
                    <label for="park">Park:</label>
                    <input name="park" type="text" class="form-control" id="park" placeholder="Park" />
                </div>
                <div class="form-group">
                    <label for="minHeight">Minimum Height (cm)</label>
                    <input name="minHeight" type="number" min="0" class="form-control" id="minHeight" placeholder="Minimum Height" />
                </div>
                <div class="form-group">
                    <label for="cost">Cost:</label>
                    <input name="cost" type="number" min="0" class="form-control" id="cost" placeholder="Cost" />
                </div>
                <div class="form-group">
                    <label for="rideType">Ride Type:</label>
                    <input name="rideType" type="text" class="form-control" id="rideType" placeholder="Ride Type" />
                </div>
                <div class="form-group">
                    <label for="employee">Employee:</label>
                    <input name="employee" type="text" class="form-control" id="employee" placeholder="Employee Name" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-default" href="manager-account.php">Cancel</a>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>