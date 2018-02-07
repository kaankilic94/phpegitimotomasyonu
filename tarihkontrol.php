<?php
error_reporting(0);

session_start();

$vt = @new mysqli("localhost","root","","kou");
mysqli_set_charset($vt, "utf8");

//soru id'leri tut

$y=0;

$so=$_POST['soruid'];
$cev=$_POST['dogruu'];


$sqll=$vt->query("SELECT * FROM tarih WHERE tid=$so");

while ($row = $sqll->fetch_object())
{
    if($row->dogru == $cev)
    {
      include "tarihyazbasarili.php";
    }
    else
    {
       include "tarihyazbasarisiz.php";
    }
}

?>