<?php

error_reporting(0);

session_start();

$siltid = $_POST['tid'];

$silsoru = $_POST['soru'];

$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM sosyal WHERE tid=$siltid");

if ($sor){
    include "sosyalsilvtbasarili.php";
}
else{
    include "sosyalsilvtbasarisiz.php";

}


?>