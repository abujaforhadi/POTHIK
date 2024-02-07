<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "travel";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
