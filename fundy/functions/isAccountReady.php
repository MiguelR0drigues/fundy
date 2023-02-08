<?php
function isAccountReady()
{
   $_SESSION["isLoggedIn"] 
    ? $_SESSION["isVerified"] = 1
        ? //
        : header("Location: verify-account.php")
    : header("Location: login.php");
}
?>