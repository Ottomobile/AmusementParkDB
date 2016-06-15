<?php
    session_start();

    // Connect to database
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    if($_SESSION['loggedInUser']){
        $usertype = $_SESSION['loggedInUser'][0];
        $name = $_SESSION['loggedInUser'][1];
        $password = $_SESSION['loggedInUser'][2];

        // Compose Query: Check if the name exists
        $query = sprintf("SELECT * FROM %s WHERE name ='%s'", $usertype, $name);

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
        if($numRows == 0){
            $_SESSION['error'] = "<p id='p-label'>User does not exists. Re-attempt login. <a id='p-label' href='loginFront.php'>&larr; Back</a></p>";
            header("Location: loginError.php");
            exit;
        }

        $row = mysql_fetch_assoc($result);

    }
    else{
        $_SESSION['error'] = "<p id='p-label'>Failed to retrieve fields. Re-attempt login. <a id='p-label' href='login.html'>&larr; Back</a></p>";
        header("Location: loginError.php");
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Edit Manager Account</title>
</head>
<body style="background-image:url('../images/AmusementPark-2.jpg'); background-size:100%; background-repeat:repeat-y">
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
            <h1 id="header-1">Edit Manager Account</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="manager-update.php" id="form-background" method="post">
                <div class="radio" id="gender-radio">
                    <p id="p-label">Gender:</p>
                    <label><input type="radio" name="gender" value="F" required <?php if ($row['Gender'] == 'F'){ echo 'checked'; } ?> />Female</label><br />
                    <label><input type="radio" name="gender" value="M" <?php if ($row['Gender'] == 'M'){ echo 'checked'; } ?> />Male</label>
                </div>
                <div class="form-group">
                    <label for="birthDate">Birth Date:</label>
                    <input name="birthDate" type="date" class="form-control" id="birthDate" placeholder="mm/dd/yyyy" value="<?php echo $row['BirthDate']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="111-222-3333" value="<?php echo $row['PhoneNumber']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="123 Main Street" value="<?php echo $row['Address']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="sin">SIN:</label>
                    <input name="sin" type="number" min="0" class="form-control" id="sin" placeholder="SIN" value="<?php echo $row['Sin']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="wage">Wage ($):</label>
                    <input name="wage" type="number" min="0" class="form-control" id="wage" placeholder="Wage" value="<?php echo $row['Wage']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="datestart">Date Start:</label>
                    <input name="datestart" type="date" class="form-control" id="datestart" placeholder="mm/dd/yyyy" value="<?php echo $row['DateStart']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input name="password" type="password" class="form-control" id="pwd" placeholder="New Password" value="<?php echo $row['Loginpwd']; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="pwd-retype">Retype Password:</label>
                    <input name="password-retype" type="password" class="form-control" id="pwd-retype" placeholder="Retype Password" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="manager-account.php" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>