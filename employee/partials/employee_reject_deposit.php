<?php 

//Include constants.php file here
include('../../connect.php');

// 1. Get the deposit number to be rejected
$deposit_id = $_GET['deposit_id'];

//2. Create SQL Query to reject deposit
$sql = "UPDATE deposit SET application_status='Rejected' WHERE deposit_id=$deposit_id ";

//Execute the Query
$res = $conn->query($sql);

// Check whether the query executed successfully or not
if($res==true)
{
    //Create Session Variable to Display Message
    $_SESSION['deposit-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"deposit Application Rejected sucessfully\" readonly></div><br>";

    //Redirect to Branch info Page
    echo "<script>window.top.location='http://localhost/bank/employee/employee_deposit_app.php'</script>";
}
else
{
    $_SESSION['deposit-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Failed to Reject deposit Application.\" readonly></div><br>";        
    echo "<script>window.top.location='http://localhost/bank/employee/employee_deposit_app.php'</script>";
}
?>