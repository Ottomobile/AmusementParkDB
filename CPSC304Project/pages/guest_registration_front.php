<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Guest Registration</title>
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
            <h1 id="header-1">Guest Registration</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form role="form" action="guest_registration_back.php" id="form-background" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" required/>
            </div>
            <div class="radio" id="gender-radio">
                <p id="p-label">Gender:</p>
                <label><input type="radio" name="gender" value="F" required/>Female</label><br />
                <label><input type="radio" name="gender" value="M"/>Male</label>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date:</label>
                <input name="birthDate" type="date" class="form-control" id="birthDate" placeholder="mm/dd/yyyy" required/>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="111-222-3333" required/>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input name="address" type="text" class="form-control" id="address" placeholder="123 Main Street" required/>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="John.Smith@ubc.ca" required/>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input name="password" type="password" class="form-control" id="pwd" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label for="pwd-retype">Retype Password:</label>
                <input name="password-retype" type="password" class="form-control" id="pwd-retype" placeholder="Retype password" required/>
            </div>
            <div class="form-group">
                <label for="accountBalance">Initial Account Balance ($):</label>
                <input name="accountBalance" type="number" min="0" class="form-control" id="pwd-retype" placeholder="1000" required/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>
