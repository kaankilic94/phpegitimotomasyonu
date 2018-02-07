<?php

error_reporting(0);

session_start();

$siltid = $_POST['id'];

$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM sosyalvideos WHERE id=$siltid");
if($sor){
    include "sosyalvideosilvtbasarili.php";
}
else
{
    include "sosyalvideosilvtbasarisiz.php";
}

?>