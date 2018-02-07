<?php

error_reporting(0);

session_start();

$silduyuruid = $_POST['duyurid'];
$t_gun=$_POST['bitgun'];
$t_ay=$_POST['bitay'];
$t_yil=$_POST['bityil'];
$silduyurubas = $_POST['duyurubas'];
$silduyurulink = $_POST['duyurulink'];
$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM genelduyurular WHERE duyuruid=$silduyuruid");

if($sor)
{
    include "duyurusilvtbasarili.php";
}
else
{
    include "duyurusilvtbasarisiz.php";
}


?>