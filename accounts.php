<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}
include('./include/db.php');

if ($_SESSION['role'] == 'ADMIN') { header("location:adminaccounts.php");}
else if($_SESSION['role'] == 'SUPERADMIN'){
 header("location:adminaccounts.php");
}

else {
   header("location:myaccount.php");
}

?>