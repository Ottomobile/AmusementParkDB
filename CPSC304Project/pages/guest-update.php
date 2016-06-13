<?php
    session_start();

    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    $status = "good";

    // Store the form values in variables
    $name = $_SESSION['loggedInUser'][1];
    $gender = mysql_real_escape_string($_POST['gender']);
    $birthdate = mysql_real_escape_string($_POST['birthDate']);
    $phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
    $address = mysql_real_escape_string($_POST['address']);
    $emailAddress = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $passwordRetype = mysql_real_escape_string($_POST['password-retype']);

    // Check if the passwords match
    if($password != $passwordRetype){
        $status = "passwordMismatch";
    }
    elseif($name && $gender && $birthdate && $phoneNumber && $address && $emailAddress && $password){

        // Prepare update statement
        $query = sprintf("UPDATE guest
                          SET gender='%s', birthDate='%s', phoneNumber='%s', address='%s', emailAddress='%s', loginPwd='%s'
                          WHERE name='%s';",
                          $gender, $birthdate, $phoneNumber, $address, $emailAddress, $password, $name);

        // Perform query
        $result = mysql_query($query);

        // Check result
        // This shows the actual query sent to MySQL, and the error. Useful for debugging.
        if (!$result) {
            $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        // Successfully updated guest account
    }
    else{
        $status = "missingFields";
        print "<p id='p-label'>Please fill in the missing fields</p>";
    }
?>      

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Edit Guest Details</title>
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
            <h1 id="header-1">Guest Account Update Status</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-background">
                <?php
                    if($status == "passwordMismatch"){
                        echo "<p id='p-label'>Passwords do not match.  Account not updated.</p>";
                    }
                    elseif($status == "good"){
                        echo "<p id='p-label'>Successfully updated the account of " . $name . "!</p>";
                    }
                    echo "<br>
                            <div class='btn-group-vertical'>
                                <a class='btn btn-default' href='guest-account.php'>Guest Account Home</a>
                            </div>";
                ?>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>