<?php
    session_start();

    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    $status = "good";

    // Store the form values in variables
    $name = mysql_real_escape_string($_POST['name']);
    $gender = mysql_real_escape_string($_POST['gender']);
    $birthdate = mysql_real_escape_string($_POST['birthDate']);
    $phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
    $address = mysql_real_escape_string($_POST['address']);
    $sin = mysql_real_escape_string($_POST['sin']);
    $wage = mysql_real_escape_string($_POST['wage']);
    $dateStart = mysql_real_escape_string($_POST['dateStart']);
    $password = mysql_real_escape_string($_POST['pwd']);
    $passwordRetype = mysql_real_escape_string($_POST['pwd-retype']);
    $reportsTo = mysql_real_escape_string($_POST['reportto']);
    $worksAt = mysql_real_escape_string($_POST['workat']);

    // Compose Query: Check if the name is unique
    $query = sprintf("SELECT * FROM employee WHERE name ='%s'",
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
        $status = "NameNotUnique";
    }
    // Check if the passwords match
    elseif($password != $passwordRetype){
        $status = "passwordMismatch";
    }
    elseif($name && $gender && $birthdate && $phoneNumber && $address && $password && $sin && $wage && $dateStart && $reportsTo && $worksAt){
        // Prepare update statement
        $query = sprintf("INSERT INTO `employee`(`Name`, `Gender`, `BirthDate`, `PhoneNumber`, `Address`, `LoginPwd`, `Sin`, `Wage`, `DateStart`, `ReportsTo`, `WorksAt`)
                          VALUES ('%s','%s','%s','%s', '%s','%s','%s', '%s','%s','%s','%s')",
                          $name, $gender, $birthdate, $phoneNumber, $address, $password, $sin, $wage, $dateStart, $reportsTo, $worksAt);

        // Perform query
        $result = mysql_query($query);

        // Check result
        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
        if (!$result) {
            $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        // Successfully added new employee account
    }
    else{
        $status = "missingFields";
    }
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
                <?php
                    if($status == "good"){
                        echo "<p id='p-label'>Successfully added new employee account.</p>";
                    }
                    elseif($status == "NameNotUnique"){
                        echo "<p id='p-label'>Please type in a unique name. <a id='p-label' href='manager-account.php'>&larr; Back</a></p>";
                    }
                    elseif($status == "passwordMismatch"){
                        echo "<p id='p-label'>Passwords do not match. Account could not be created. <a id='p-label' href='manager-account.php'>&larr; Back</a></p>";
                    }
                    else{
                        echo "<p id='p-label'>Please fill in the missing fields</p>";
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