<?php
    require_once('./config/contentoperation.php');
    $db = new contentoperations();
    
    session_destroy();
    header("Location: login.php");

?>