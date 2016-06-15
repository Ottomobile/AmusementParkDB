<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Manager Account</title>
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
                    <li class="active">
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
            <h1 id="header-1">Manager Account</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
            <form role="form" id="form-background" method="post">
                <?php
                echo "<p id='p-label'>Login Successful!</p>";
                echo "<p id='p-label'>Successfully logged in as ".$_SESSION['loggedInUser'][0]." ".$_SESSION['loggedInUser'][1].".</p>";
                echo "<br>
                            <div class='btn-group-vertical'>
                                <a class='btn btn-primary' href='manager-edit.php'>Edit account details</a>
                                <br>
                                <a class='btn btn-info' href='manager-add-employee-front.php'>Add employee</a>
                                <br>
                                <a class='btn btn-info' href='manager-remove-employee-front.php'>Remove employee</a>
                                <br>
                                <a class='btn btn-success' href='manager-add-ride-front.php'>Add ride</a>
                                <br>
                                <a class='btn btn-success' href='manager-remove-ride-front.php'>Remove ride</a>
                                <br>
                                <a class='btn btn-default' href='manager-project-select-front.php'>Project and select query</a>
                                <br>
                                <a class='btn btn-default' href='manager-join-front.php'>Join query</a>
                                <br>
                                <a class='btn btn-default' href='manager-division-front.php'>Division query</a>
                                <br>
                                <a class='btn btn-default' href='manager-aggregation-front.php'>Aggregation query</a>
                                <br>
                                <a class='btn btn-default' href='manager-aggregation-nested-front.php'>Nested aggregation with group-by query</a>
                                <br>
                                <a class='btn btn-danger' href='manager-delete.php'>Delete account</a>
                            </div>";
                ?>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>