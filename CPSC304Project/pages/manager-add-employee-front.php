<?php
    session_start();
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
                    <input type="text" class="form-control" id="name" placeholder="Name" />
                </div>
                <div class="radio" id="gender-radio">
                    <p id="p-label">Gender:</p>
                    <label><input type="radio" name="gender" />Female</label><br />
                    <label><input type="radio" name="gender" />Male</label>
                </div>
                <div class="form-group">
                    <label for="birthDate">Birth Date:</label>
                    <input type="date" class="form-control" id="birthDate" placeholder="mm/dd/yyyy" />
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="111-222-3333" />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="123 Main Street" />
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" placeholder="John.Smith@ubc.ca" />
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="pwd-retype">Retype Password:</label>
                    <input type="password" class="form-control" id="pwd-retype" placeholder="Retype password" />
                </div>
                <div class="form-group">
                    <label for="sin">SIN:</label>
                    <input type="number" min="0" class="form-control" id="sin" placeholder="SIN"/>
                </div>
                <div class="form-group">
                    <label for="wage">Wage ($ Per Hour):</label>
                    <input type="number" min="0" class="form-control" id="wage" placeholder="Wage"/>
                </div>
                <div class="form-group">
                    <label for="dateStart">Start Date:</label>
                    <input type="date" class="form-control" id="dateStart" placeholder="mm/dd/yyyy" />
                </div>
                <div class="form-group">
                    <label for="manager">Manager:</label>
                    <input type="text" class="form-control" id="manager" placeholder="Manager Name" />
                </div>
                <div class="form-group">
                    <p id="p-label">Work At:</p>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            Facility
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ride 1</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ride 2</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ride 3</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Store 1</a></li>
                        </ul>
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