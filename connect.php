<?php
    // This file is used to connect the website with databse
    // For time being all websites and queries pass through this user
    // This user act as DBA and has all previlleges granted 

    //Please import the databse to SQL before attempting to connect

    // START THE SESSION
    session_start();

    $servername = "localhost";
    $username = "root"; // For MYSQL the predifined username is root
    $password = ""; // For MYSQL the predifined password is " "(blank)
    $dbname = "bank"; // Database Name
    define('SITEURL','localhost/bank/');
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        //PHP nl2br() function which inserts HTML line breaks before all newlines in a string.
        // /r/n is also used for new line
        echo nl2br("\r\nPlease start your SQL server and check again\r\n\r\n");
        die("Connection failed: " . $conn->connect_error);

    }
?>