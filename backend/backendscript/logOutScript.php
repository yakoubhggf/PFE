<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
session_unset();
session_destroy();

$script=<<<Script
    <script>
    window.location.href='../../frontend/website/loginPage/login.php';
    </script>
Script;
echo $script;
?>