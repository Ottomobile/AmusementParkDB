<?php
    session_start();

    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Play Games Result</title>
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
                    <li>
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
            <h1 id="header-1">Play Games Result</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-background">
                <div class="form-group">
                    <?php
                    $name = $_SESSION['loggedInUser'][1];

                    // Get account balance
                    $query = sprintf("SELECT accountBalance FROM guest WHERE name = '%s';", $name);

                    // Perform query
                    $result = mysql_query($query);

                    // Check result
                    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                    if (!$result) {
                        $message  = 'Invalid query: ' . mysql_error() . "\n";
                        $message .= 'Whole query: ' . $query;
                        die($message);
                    }
                    $row = mysql_fetch_assoc($result);
                    $accountBalance = $row['accountBalance'];

                    // Get cost of ride
                    $query = sprintf("SELECT Cost FROM game WHERE GameID = %s;", $_POST['GameID']);

                    // Perform query
                    $result = mysql_query($query);

                    // Check result
                    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                    if (!$result) {
                        $message  = 'Invalid query: ' . mysql_error() . "\n";
                        $message .= 'Whole query: ' . $query;
                        die($message);
                    }
                    $row = mysql_fetch_assoc($result);
                    $cost = $row['Cost'];

                    // Check if guest has enough money to go on ride
                    if($accountBalance - $cost < 0){
                        echo "<p id='p-label'>Not enough money play. Reload more money onto account.</p>";
                    }
                    else{
                        // Update account balance to reflect that guest visited ride
                        $query = sprintf("UPDATE guest SET accountBalance = accountBalance - %s WHERE name = '%s'", $cost, $name);

                        // Perform query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }

                        // Retrieve guestID
                        $query = sprintf("SELECT GuestID FROM guest WHERE name = '%s'", $name);

                        // Perform query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }
                        $row = mysql_fetch_assoc($result);
                        $guestID = $row['GuestID'];

                        $gameResult = rand(0,1);
                        if($gameResult == 0){
                            echo "<p id='p-label'>You lost the game.</p>";
                        }
                        else{
                            echo "<p id='p-label'>Congratulations! You won the game!</p>";
                        }

                        // Update visited table to reflect that guest visited ride
                        $query = sprintf("INSERT INTO `plays`(`Playsdatetime`, `Result`, `GuestID`, `GameID`)
                                         VALUES ('%s', %s, %s, %s)", date("Y-m-d h:i:s"), $gameResult, $guestID, $_POST['GameID']);

                        // Perform query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }

                        // Get new account balance
                        $query = sprintf("SELECT accountBalance FROM guest WHERE name = '%s'", $name);

                        // Perform query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }

                        $row = mysql_fetch_assoc($result);
                        $newAccountBalance = $row['accountBalance'];
                        echo "<p id='p-label'>New Acccount Balance: $".$newAccountBalance."</p>";
                    }
                    ?>
                </div>
                <a class="btn btn-default" href="guest-account.php">Guest Account Home</a>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>