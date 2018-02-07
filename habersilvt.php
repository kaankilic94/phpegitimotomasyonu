<?php

error_reporting(0);

session_start();

$silhid = $_POST['haberid'];
$h_gun=$_POST['hgun'];
$h_ay=$_POST['hay'];
$h_yil=$_POST['hyil'];
$silhbas = $_POST['hbas'];
$silhlink = $_POST['hlink'];
$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM bolumhaber WHERE hid=$silhid");

if($sor)
{
    include "habersilvtbasarili.php";
}
else
{
    include "habersilvtbasarisiz.php";
}


?>