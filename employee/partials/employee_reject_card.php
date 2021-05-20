<?php 

    //Include constants.php file here
    include('../../connect.php');

    // 1. Get the card number to be rejected
    $card_number = $_GET['card_number'];

    //2. Create SQL Query to reject card
    $sql = "UPDATE card SET application_status='Rejected' WHERE card_number=$card_number ";

    //Execute the Query
    $res = $conn->query($sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Create Session Variable to Display Message
        $_SESSION['card-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Card Application Rejected sucessfullly\" readonly></div><br>";

        //Redirect to Branch info Page
        echo "<script>window.top.location='http://localhost/bank/employee/employee_card_app.php'</script>";
    }
    else
    {
        $_SESSION['card-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Failed to Reject Card Application.\" readonly></div><br>";        
        echo "<script>window.top.location='http://localhost/bank/employee/employee_card_app.php'</script>";
    }
?>