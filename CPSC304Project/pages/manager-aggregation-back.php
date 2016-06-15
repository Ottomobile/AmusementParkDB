<?php
    session_start();
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Aggregation Query Result</title>
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
            <h1 id="header-1">Aggregation Query Result</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-background">
                <p id="p-label">Aggregation Query Result</p>
                <?php
                    if($_POST['aggegrationChoice'] == "0"){
                        echo "<p id='p-label'>Names of the guests who have the highest account balance:</p>";
                    }
                    else{
                        echo "<p id='p-label'>The sum of all guest account balances:</p>";
                    }
                ?>
                <br />
                <table class="table table-striped" style="background-color:white">
                    <thead>
                        <tr>
                            <?php
                            if($_POST['aggegrationChoice'] == "0"){
                                echo "<th>Name</th>";
                            }
                            else{
                                echo "<th>Sum ($)</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Formulate query
                        if($_POST['aggegrationChoice'] == "0")
                            $query = sprintf("SELECT name AS result FROM guest WHERE accountBalance >= ALL (SELECT accountBalance FROM guest);");
                        else
                            $query = sprintf("SELECT SUM(accountBalance) AS result FROM guest;");

                        // Perform Query
                        $result = mysql_query($query);

                        // Check result
                        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
                        if (!$result) {
                            $message  = 'Invalid query: ' . mysql_error() . "\n";
                            $message .= 'Whole query: ' . $query;
                            die($message);
                        }

                        while($row = mysql_fetch_assoc($result))
                            echo "<tr><td>".$row['result']."</td></tr>";
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-default" href="manager-account.php">Account Home</a>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>