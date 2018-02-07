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

$sor=$vt->query("SELECT * FROM sosyal");

while($row = $sor->fetch_object())
{
    if($row->tid)
    {
        $j= $j + $row->tid;
    }
}

$_SESSION['idn']=$num;

$dsoru=htmlentities($_POST['soru'],ENT_QUOTES);
$dcevapa= htmlentities($_POST['cevapa'],ENT_QUOTES);
$dcevapb= htmlentities($_POST['cevapb'],ENT_QUOTES);
$dcevapc= htmlentities($_POST['cevapc'],ENT_QUOTES);
$dcevapd= htmlentities($_POST['cevapd'],ENT_QUOTES);
$radyo=$_POST['sonuc'];

$vt->query("INSERT INTO sosyal(tid,soru,cevap1,cevap2,cevap3,cevap4,dogru) VALUES ('$j','$dsoru','$dcevapa','$dcevapb','$dcevapc','$dcevapd','$radyo')");

include "sosyaleklevtbasarili.php";
//$sonuc = $vt->query($sql);









?>