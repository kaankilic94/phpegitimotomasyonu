<?php

error_reporting(0);

session_start();

$siltid = $_POST['id'];

$sno=$_SESSION['no'];


$veritabani=@new mysqli("localhost","root","","kou");
mysqli_set_charset($veritabani,"utf8");

$top=0;

$i=0;


$sor = $veritabani->query("DELETE FROM fenvideos WHERE id=$siltid");
if($sor)
{
    include "fenvideosilvtbasarili.php";
}
else
{
    include "fenvideosilvtbasarisiz.php";
}



?>