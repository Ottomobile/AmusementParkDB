<?php
    session_start();

    // Connect to database
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    if($_POST['name'] && $_POST['password'] && $_POST['usertype']){
        $name = mysql_real_escape_string($_POST['name']);
        $password = mysql_real_escape_string($_POST['password']);
        $usertype = mysql_real_escape_string($_POST['usertype']);

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
        else{
            $row = mysql_fetch_assoc($result);
            if($usertype == "guest" && $row['name'] == $name && $row['loginPwd'] == $password){
                $_SESSION['loggedInUser'] = array($usertype, $name, $password);
                header("Location: guest-account.php");
                exit;
            }
            elseif($usertype == "employee" && $row['Name'] == $name && $row['Loginpwd'] == $password){
                $_SESSION['loggedInUser'] = array($usertype, $name, $password);
                header("Location: employee-account.php");
                exit;
            }
            elseif($usertype == "manager" && $row['Name'] == $name && $row['Loginpwd'] == $password){
                $_SESSION['loggedInUser'] = array($usertype, $name, $password);
                header("Location: manager-account.php");
                exit;
            }
            else{
                $_SESSION['error'] = "<p id='p-label'>Incorrect credentials. Re-attempt login. <a id='p-label' href='loginFront.php'>&larr; Back</a></p>";
                header("Location: loginError.php");
                exit;
            }
        }
    }
    else{
        $_SESSION['error'] = "<p id='p-label'>Failed to retrieve fields. Re-attempt login. <a id='p-label' href='login.html'>&larr; Back</a></p>";
        header("Location: loginError.php");
    }
?>          