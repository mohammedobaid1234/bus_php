<?php
error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$db = "students";

$conn = mysqli_connect($host, $user, '', $db);

//get data setting
//$query="SELECT * FROM tbl_setting where id='1'";
//$mysqli_query=mysqli_query($conn, $query);
//$mysqli_fetch_assoc=mysqli_fetch_assoc($mysqli_query);

