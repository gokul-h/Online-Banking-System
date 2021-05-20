<?php 
    include('../../connect.php');
    $branch_id = $_GET['branch_id'];
    $sql = "DELETE FROM branch WHERE branch_id=$branch_id";
    $res = $conn->query($sql);
    if($res==true)
    {

        $_SESSION['delete'] = "<div class='success'>Branch Deleted Successfully.</div>";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_branch_info.php'</script>";
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Branch. Try Again Later.</div>";
        echo "<script>window.top.location='http://localhost/bank/admin/admin_branch_info.php'</script>";
    }
?>