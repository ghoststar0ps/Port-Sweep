<?php


function dbConncet($host,$user,$pass,$database){
	$con = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno())
	{
	die("Connection error: " . mysqli_connect_errno());
	}
	return $con; 
}


function RealIpAddress()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))
//check ip from internet
{
$ipadd=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
//check ip proxy
{
$ipadd=$_SERVER['HTTP_X_FORWARDED_FOR'];

}

else
{
$ipadd=$_SERVER['REMOTE_ADDR'];
}
return $ipadd;
}
?>