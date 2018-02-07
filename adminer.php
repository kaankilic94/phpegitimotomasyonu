<?php

session_start();

error_reporting(0);

$_SESSION['mail']= $_POST['mail'];
$_SESSION['pass']= $_POST['pass'];

$userad=$_POST['mail'];
$sifre=$_POST['pass'];


$toplam=0;

$db = @new mysqli("localhost","root","","kou");

if($db->connect_error)
{
    die ("Hata: ". $db->connect_error );
}
else
{
    $query= $db->query("SELECT * FROM admin");

    while( $row = $query->fetch_object())
    {
        if($row->username==$userad && $row->passw == $sifre)
        {
            $toplam++;
            $idnum = $row->uid;
            $girisid = $row->id;
            $ad = $row->ad;
        }
    }
}


$_SESSION["uye"]=$ad;
$_SESSION['no']= $girisid;

if($toplam==1)
{
    if($idnum==5)
    {
        include "adminbasarili.php";
    }
    elseif($idnum==1)
    {
        include "adminbasarili2.php";
    }
    elseif ($idnum==3){
        include "adminbasarili3.php";

    }
    elseif ($idnum==2){
        include "adminbasarili4.php";

    }
    elseif ($idnum==4){
        include "adminbasarili5.php";
    }

}

else
{
   include "adminbasarisiz.php";
}


?>
