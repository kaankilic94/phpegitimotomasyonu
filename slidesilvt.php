<?php

error_reporting(0);

session_start();

$silslideid = $_POST['slid'];
$s_gun=$_POST['sbitgun'];
$s_ay=$_POST['sbitay'];
$s_yil=$_POST['sbityil'];
$silslidebas = $_POST['slidebas'];
$silslidelink = $_POST['slidelink'];
$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM slider WHERE slideid=$silslideid");

if($sor)
{
    include "slidesilvtbasarili.php";
}
else
{
    include "slidesilvtbasarisiz.php";
}


?>