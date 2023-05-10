<?php
if(!isset($_SESSION['id']))
{
    session_destroy();
    header( "Location:/students/index.php");
    exit;
}
