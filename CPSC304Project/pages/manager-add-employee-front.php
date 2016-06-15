<?php
    session_start();
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Add Employee</title>
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
            <h1 id="header-1">Add Employee</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="manager-add-employee-back.php" id="form-background" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" />
                </div>
                <div class="radio" id="gender-radio">
                    <p id="p-label">Gender:</p>
                    <label><input type="radio" name="gender" />Female</label><br />
                    <label><input type="radio" name="gender" />Male</label>
                </div>
                <div class="form-group">
                    <label for="birthDate">Birth Date:</label>
                    <input name="birthDate" type="date" class="form-control" id="birthDate" placeholder="mm/dd/yyyy" />
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="111-222-3333" />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="123 Main Street" />
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="pwd-retype">Retype Password:</label>
                    <input name="pwd-retype" type="password" class="form-control" id="pwd-retype" placeholder="Retype password" />
                </div>
                <div class="form-group">
                    <label for="sin">SIN:</label>
                    <input name="sin" type="number" min="0" class="form-control" id="sin" placeholder="SIN"/>
                </div>
                <div class="form-group">
                    <label for="wage">Wage ($ Per Hour):</label>
                    <input name="wage" type="number" min="0" class="form-control" id="wage" placeholder="Wage"/>
                </div>
                <div class="form-group">
                    <label for="dateStart">Start Date:</label>
                    <input name="dateStart" type="date" class="form-control" id="dateStart" placeholder="mm/dd/yyyy" />
                </div>
                <div class="form-group">
                    <p id="p-label">Manager:</p>
                    <div class="dropdown">
                        <select class="form-control" name="reportto">
                            <?php
                            // Prepare update statement
                            $query = "SELECT ManagerID, Name FROM manager;";

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
                                $htmlToPrint = sprintf("<option value='%s'>%s</option>", $row['ManagerID'], $row['Name']);
                                echo $htmlToPrint;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <p id="p-label">Work At:</p>
                    <div class="dropdown">
                        <select class="form-control" name="workat">
                            <?php
                            // Prepare update statement
                            $query = "SELECT FacilityID, Name FROM ride;";

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
                                $htmlToPrint = sprintf("<option value='%s'>%s</option>", $row['FacilityID'], $row['Name']);
                                echo $htmlToPrint;
                            }
                            ?>
                        </select>
                        <br />
                    </div>
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