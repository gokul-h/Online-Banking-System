<?php 

//Include constants.php file here
include('../../connect.php');

// 1. Get the account number to be rejected
$account_number = $_GET['account_number'];

//2. Create SQL Query to reject account
$sql = "UPDATE account SET application_status='Rejected' WHERE account_number=$account_number ";

//Execute the Query
$res = $conn->query($sql);

// Check whether the query executed successfully or not
if($res==true)
{
    //Create Session Variable to Display Message
    $_SESSION['account-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Account Application Rejected sucessfully\" readonly></div><br>";

    //Redirect to Branch info Page
    echo "<script>window.top.location='http://localhost/bank/employee/employee_account_app.php'</script>";
}
else
{
    $_SESSION['account-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Failed to Reject account Application.\" readonly></div><br>";        
    echo "<script>window.top.location='http://localhost/bank/employee/employee_account_app.php'</script>";
}
?>