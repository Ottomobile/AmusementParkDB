<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Reset</title>
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
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="guest_registration_front.php">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Guest Registration
                        </a>
                    </li>
                    <li>
                        <a href="loginFront.php">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
            $connection = mysql_connect("localhost", "root", "") or die("Couldn't connect to the database!");
            mysql_select_db("amusement_park", $connection) or die("Couldn't connect to the database!");

            // Drop the database
            $query = "DROP DATABASE amusement_park";

            // Perform Query
            $result = mysql_query($query);

            // Check result
            // This shows the actual query sent to MySQL, and the error. Useful for debugging.
            if (!$result) {
                $message  = 'Invalid query: ' . mysql_error() . "\n";
                $message .= 'Whole query: ' . $query;
                die($message);
            }

            // Create the database
            $query = "CREATE DATABASE amusement_park";

            // Perform Query
            $result = mysql_query($query);

            // Check result
            // This shows the actual query sent to MySQL, and the error. Useful for debugging.
            if (!$result) {
                $message  = 'Invalid query: ' . mysql_error() . "\n";
                $message .= 'Whole query: ' . $query;
                die($message);
            }

            // Reconnect to database
            $connection = mysql_connect("localhost", "root", "") or die("Couldn't connect to the database!");
            mysql_select_db("amusement_park", $connection) or die("Couldn't connect to the database!");

            $filename = '../sql/amusement_park.sql';
            // Temporary variable, used to store current query
            $templine = '';
            // Read in entire file
            $lines = file($filename);
            // Loop through each line
            foreach ($lines as $line)
            {
                // Skip it if it's a comment
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                // Add this line to the current segment
                $templine .= $line;
                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';')
                {
                    // Perform the query
                    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                    // Reset temp variable to empty
                    $templine = '';
                }
            }
            echo "<h1 id=\"header-1\">Database reset to defaults</h1>";
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <a class="btn btn-default" href="index.php">Homepage</a>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>

</body>
</html>