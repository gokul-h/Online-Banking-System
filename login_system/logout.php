<?php 
    //Include constants.php for SITEURL
    include('../connect.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. Redirect to Login Page
    echo "<script>window.top.location='http://localhost/bank/index.php'</script>";

?>