<?php
//authorization - access control
//check whether the user is logged in or not
if(!isset($_SESSION['user']))//if the user session is not set
{
    //user is not logged in
    //redirect to login with message
    $_SESSION['no-login-message']="<div class='error'>Please login to access Admin Panel.</div>";
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
}


?>