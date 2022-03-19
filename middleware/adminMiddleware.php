<?php

include_once '../functions/myFunctions.php';

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php", "You are not authorized to access this page...!");        
        ob_end_clean();
        ob_end_flush();
    }
}
else
{
    redirect("../login.php", "Login to Continue...!");    
}

?>