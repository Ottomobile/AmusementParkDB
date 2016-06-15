<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Add Ride Status</title>
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
            <h1 id="header-1">Add Ride Status</h1>
        </div>
    </div>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form id="form-background">
            <?php
                $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
                mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
       
                // if($_POST['name'] && $_POST['password']){
                    $name = mysql_real_escape_string($_POST['name']);
                //     $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
   
                    // Compose Query: Check if the name is unique
                    $query = sprintf("SELECT * FROM ride WHERE name ='%s'",
                    mysql_real_escape_string($name));

                    // Perform Query
                    $result = mysql_query($query);

                    // Check result
                    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                    if (!$result) {
                        $message  = 'Invalid query: ' . mysql_error() . "\n";
                        $message .= 'Whole query: ' . $query;
                        die($message);
                    }

                    // Check the number of rows
                    $numRows = mysql_num_rows($result);
                    if($numRows != 0){
                        die("<p id='p-label'>Please type in a unique name. <a id='p-label' href='manager-add-ride-front.php'>&larr; Back</a></p>");
                    }

                   // Store the form values in variables
                   $name = $_POST['name'];
                   $capacity = $_POST['capacity'];
                   $gpsLocation = $_POST['gpslocation'];
                   $park = $_POST['park'];
                   $minHeight = $_POST['minHeight'];
                   $cost = $_POST['cost'];
                   $rideType = $_POST['rideType'];

/*                   // Check if the passwords match
                   if($password != $passwordRetype)
                        die("<p id='p-label'>Passwords do not match.  Please re-enter form fields. <a id='p-label' href='guest_registration_front.php'>&larr; Back</a></p>");
*/
                   if($name && $capacity && $gpsLocation && $park && $minHeight && $cost &&
                      $rideType){

                        // Prepare insert statement
                        $query = sprintf("INSERT INTO `ride`(`name`, `capacity`, `gpsLocation`, `park`, 
                                        `minHeight`, `cost`, `rideType`)
                                         VALUES ('%s','%d','%s','%s', '%d','%d','%s');",
                                         mysql_real_escape_string($name),
                                         mysql_real_escape_string($capacity),
                                         mysql_real_escape_string($gpsLocation),
                                         mysql_real_escape_string($park),
                                         mysql_real_escape_string($minHeight),
                                         mysql_real_escape_string($cost),
                                         mysql_real_escape_string($rideType));

                        // Perform query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }
                        else{
                            print "<p id='p-label'>Successfully added new ride: " . $name . "!</p>";
                        }
                    }
                    else{
                        print "<p id='p-label'>Please fill in the missing fields</p>";
                    }
            ?>
            <a class="btn btn-default" href="manager-account.php">Account Home</a>
        </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>