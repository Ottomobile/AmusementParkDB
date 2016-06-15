<?php
    session_start();

    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    // Get name of manager account to delete
    $name = $_SESSION['loggedInUser'][1];

    // Prepare delete statement
    $query = sprintf("DELETE FROM manager WHERE name ='%s';", $name);

    // Perform query
    $result = mysql_query($query);

    // Check result
    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    // Successfully deleted account
    session_destroy();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Load Account Balance Status</title>
</head>
<body style="background-image:url('../images/AmusementPark-1.jpg'); height:100%">

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
                    <li>
                        <a href='guest_registration_front.php'>
                            <span class='glyphicon glyphicon-user'></span>&nbsp;Guest Registration
                        </a>
                    </li>
                    <li>
                        <a href='loginFront.php'>
                            <span class='glyphicon glyphicon-log-in'></span>&nbsp;Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 id="header-1">
                Manager account <?php echo $name;?> deleted
            </h1>
            <br />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <a class="btn btn-default" href="index.php">Home</a>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>