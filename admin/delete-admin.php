<?php 

include("../config/constants.php");

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$res = mysqli_query($conn, $sql);

if($res==true)
{
    // echo "admin deleted";
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    // echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

?>