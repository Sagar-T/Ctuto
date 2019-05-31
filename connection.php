<?php
$servername="localhost";
$username="root";
$password="";
$dbname="";

$con = mysqli_connect('localhost', 'root', '');
    if(!$con)
    {
        echo 'not connected to data base server';
    }
    if(!mysqli_select_db($con,'login'))
    {
        echo 'database not selected';
    }
?>