<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "group5";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection Failed : " . mysqli_connect_error());
}