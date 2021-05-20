<?php 
    include('../../connect.php');
    $type = $_GET['type'];
    $sql = "DELETE FROM loan_type WHERE type='$type'";
    $res = $conn->query($sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Branch Deleted Successfully.</div>";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_view_loan.php'</script>";
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Branch. Try Again Later.</div>";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_view_loan.php'</script>";
    }
?>