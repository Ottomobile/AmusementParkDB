<?php
    // Connect to database
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    $loggedIn = 0;
    if($_SESSION['loggedInUser']){
        $cookie_info = json_decode($_COOKIE['loggedInUser'], true);
        $usertype = $cookie_info[0];
        $name = $cookie_info[1];
        $password = $cookie_info[2];

        // Compose Query: Check if the name exists
        $query = sprintf("SELECT * FROM %s WHERE name ='%s' and loginPwd = '%s'", $usertype, $name, $password);

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
            die();
        }
        else{
            $loggedIn = 1;
        }
    }
?>