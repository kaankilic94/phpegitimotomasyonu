
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

$sor=$vt->query("SELECT * FROM genelduyurular");

while($row = $sor->fetch_object())
{
    if($row->duyuruid)
    {
        $j= $j + $row->duyuruid;
    }
}

$_SESSION['idn']=$num;

$dbas=htmlentities($_POST['duyurubas'],ENT_QUOTES);
$dicer= htmlentities($_POST['duyuruicerik'],ENT_QUOTES);
$dlink= $_POST['duyurulink'];
$zaman=date('d')."-".date('m')."-".date("Y");
$dtarih=$_POST['bitgun']."-".$_POST['bitay']."-".$_POST['bityil'];

$dgun=$_POST['bitgun'];
$day=$_POST['bitay'];
$dyil=$_POST['bityil'];

if($_POST['bityil'] < date('Y') )
{
    include "duyurueklevtbasarisiz2.php";
}
else if( $_POST['bityil'] == date('Y') )
{
    if($_POST['bitay'] < date('m'))
    {
        include "duyurueklevtbasarisiz2.php";
    }
    else if($_POST['bitay']==date('m'))
    {
        if($_POST['bitgun'] <= date('d'))
        {
            include "duyurueklevtbasarisiz2.php";
        }
        else
        {
            $sql= "INSERT INTO genelduyurular(duyuruid,duyurubaslik,duyuruicerik,duyurulink,tarih,gun,ay,yil,idno) VALUES ('$j','$dbas','$dicer','$dlink','$zaman','$dgun','$day','$dyil','$num')";

            $sonuc = $vt->query($sql);

            if($sonuc==0)
                include  "duyurueklevtbasarisiz.php";
            else
                include "duyurueklevtbasarili.php";
        }
    }
    else
    {
        $sql= "INSERT INTO genelduyurular(duyuruid,duyurubaslik,duyuruicerik,duyurulink,tarih,gun,ay,yil,idno) VALUES ('$j','$dbas','$dicer','$dlink','$zaman','$dgun','$day','$dyil','$num')";


        $sonuc = $vt->query($sql);

        if($sonuc==0)
            include  "duyurueklevtbasarisiz.php";
        else
            include "duyurueklevtbasarili.php";
    }
}
else
{
    $sql= "INSERT INTO genelduyurular(duyuruid,duyurubaslik,duyuruicerik,duyurulink,tarih,gun,ay,yil,idno) VALUES ('$j','$dbas','$dicer','$dlink','$zaman','$dgun','$day','$dyil','$num')";

    $sonuc = $vt->query($sql);

    if($sonuc==0)
        include  "duyurueklevtbasarisiz.php";
    else
        include "duyurueklevtbasarili.php";
}



?>

