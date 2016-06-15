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
    <title>Play Games</title>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="guest-account.php">Guest</a></li>
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
            <h1 id="header-1">Play Games</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-background" action="guest-game-back.php" method="post">
                <div class="form-group">
                    <p id="p-label">Current balance: </p>
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
                    echo "<p id=p-label>$".$row['accountBalance']."</p>";
                    ?>
                    <br />
                    <p id="p-label">Games to play:</p>
                    <div class="dropdown">
                        <select class="form-control" name="GameID">
                            <?php
                            // Prepare select statement
                            $query = "SELECT GameID, GameName, Cost FROM game;";

                            // Perform query
                            $result = mysql_query($query);

                            // Check result
                            // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                            if (!$result) {
                                $message  = 'Invalid query: ' . mysql_error() . "\n";
                                $message .= 'Whole query: ' . $query;
                                die($message);
                            }
                            while($row = mysql_fetch_assoc($result)){
                                $htmlToPrint = sprintf("<option value='%s'>%s, $%s</option>", $row['GameID'], $row['GameName'], $row['Cost']);
                                echo $htmlToPrint;
                            }
                            ?>
                        </select>
                        <br />
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-default" href="guest-account.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>