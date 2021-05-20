<?php 
    include('../../connect.php');
    $emp_id = $_GET['emp_id'];
    $sql = "UPDATE employee SET application_status='Approved' WHERE emp_id='$emp_id'";
    $res = $conn->query($sql);
    if($res==true)
    {
        $_SESSION['employe-status'] = "Employee Approved successfully.";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_add_employee.php'</script>";
    }
    else
    {
        $_SESSION['employe-status'] = "Failed to approve Employee. Try Again Later.";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_add_employee.php'</script>";
    }
?>