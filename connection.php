<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Beryl@348";
$dbname = "login_system";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
