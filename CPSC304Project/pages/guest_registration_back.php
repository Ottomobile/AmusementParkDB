<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Guest Registration Status</title>
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
                    <li><a href="#">Rides</a></li>
                    <li><a href="#">Games</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="guest_registration_front.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Guest Registration</a></li>
                    <li><a href="loginFront.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 id="header-1">Guest Registration Status</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form id="form-background">
            <?php
                $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
                mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
       
                if($_POST['name'] && $_POST['password']){
                    $name = mysql_real_escape_string($_POST['name']);
                    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
   
                    // Compose Query: Check if the name is unique
                    $query = sprintf("SELECT * FROM guest WHERE name ='%s'",
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
                        die("<p id='p-label'>Please type in a unique name. <a id='p-label' href='guest_registration.html'>&larr; Back</a></p>");
                    }

                   // Store the form values in variables
                   $name = $_POST['name'];
                   $gender = $_POST['gender'];
                   $birthdate = $_POST['birthDate'];
                   $phoneNumber = $_POST['phoneNumber'];
                   $address = $_POST['address'];
                   $emailAddress = $_POST['email'];
                   $password = $_POST['password'];
                   $passwordRetype = $_POST['password-retype'];
                   $accountBalance = $_POST['accountBalance'];
                   $firstVisit = $_POST['firstVisit'];

                   // Check if the passwords match
                   if($password != $passwordRetype)
                        die("<p id='p-label'>Passwords do not match.  Please re-enter form fields. <a id='p-label' href='guest_registration.html'>&larr; Back</a></p>");

                   if($name && $gender && $birthdate && $phoneNumber && $address &&
                      $emailAddress && $password && $accountBalance && $firstVisit){

                        // Prepare insert statement
                        $query = sprintf("INSERT INTO `guest`(`name`, `gender`, `birthDate`, `phoneNumber`, 
                                        `address`, `emailAddress`, `loginPwd`, `accountBalance`, `firstVisit`)
                                         VALUES ('%s','%s','%s','%s', '%s','%s','%s', %d, '%s');",
                                         mysql_real_escape_string($name),
                                         mysql_real_escape_string($gender),
                                         mysql_real_escape_string($birthdate),
                                         mysql_real_escape_string($phoneNumber),
                                         mysql_real_escape_string($address),
                                         mysql_real_escape_string($emailAddress),
                                         mysql_real_escape_string($password),
                                         mysql_real_escape_string($accountBalance),
                                         mysql_real_escape_string($firstVisit));

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
                            print "<p id='p-label'>Successfully registered new guest: " . $name . "!</p>";
                        }
                    }
                    else{
                        print "<p id='p-label'>Please fill in the missing fields</p>";
                    }
                }
            ?>
        </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>
