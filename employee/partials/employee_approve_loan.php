<?php 

//Include constants.php file here
include('../../connect.php');

// 1. Get the loan number to be approved
$loan_id = $_GET['loan_id'];

//2. Create SQL Query to approve loan
$sql = "UPDATE loan SET application_status='Approved' WHERE loan_id= $loan_id ";

//Execute the Query
$res = $conn->query($sql);

// Check whether the query executed successfully or not
if($res==true)
{
    //Create Session Variable to Display Message
    $_SESSION['loan-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"loan Application approved sucessfullly\" readonly></div><br>";
    //Redirect to Branch info Page
    echo "<script>window.top.location='http://localhost/bank/employee/employee_loan_app.php'</script>";
}
else
{
    //Failed to Delete Branch

    $_SESSION['loan-status'] = "<div class=\"wc\"><input class=\"form-control text-center\" type=\"text\" placeholder=\"Failed to approve loan Application\" readonly></div><br>";
    echo "<script>window.top.location='http://localhost/bank/employee/employee_loan_app.php'</script>";
}
?>