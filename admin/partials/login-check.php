<?php 
// Check if the user is logged in or not
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access admin panel</div>";
    // Redirect lo login page
    header("location:".SITEURL.'admin/login.php');
}
?>