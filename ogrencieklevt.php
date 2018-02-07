<?php
error_reporting(0);

session_start();

$userisim=$_SESSION['mail'];
$usersif =$_SESSION['pass'];

$vt = @new mysqli("localhost","root","","kou");
mysqli_set_charset($vt, "utf8");

$i=0;
$j=1;

$sorgu=$vt->query("SELECT * FROM admin");

while( $row = $sorgu->fetch_object())
{
    if($row->username==$userisim && $row->passw==$usersif)
    {
        $num = $row->id;
    }
}

$sor=$vt->query("SELECT * FROM ogrenci");

while($row = $sor->fetch_object())
{
    if($row->id)
    {
        $j= $j + $row->id;
    }
}

$_SESSION['idn']=$num;

$dmail=htmlentities($_POST['mail'],ENT_QUOTES);
$dpassw= htmlentities($_POST['passw'],ENT_QUOTES);
$dad= htmlentities($_POST['ad'],ENT_QUOTES);
$dsoyad= htmlentities($_POST['soyad'],ENT_QUOTES);




$vt->query("INSERT INTO ogrenci(id,username,passw,ad,soyad) VALUES ('$j','$dmail','$dpassw','$dad','$dsoyad')");

include "ogrencieklevtbasarili.php";




//$sonuc = $vt->query($sql);









?>