
<?php


error_reporting(0);

date_default_timezone_set('UTC');

session_start();

$userisim=$_SESSION['mail'];
$usersif =$_SESSION['pass'];

$vt = @new mysqli("localhost","root","","kou");
mysqli_set_charset($vt, "utf8");

$k=1;

$sorgu=$vt->query("SELECT * FROM admin");

while( $row = $sorgu->fetch_object())
{
    if($row->username==$userisim && $row->passw==$usersif)
    {
        $num = $row->id;
    }
}

$sor = $vt->query("SELECT * FROM slider");

while ($row = $sor->fetch_object())
{
    if($row->slideid)
    {
        $k= $k + $row->slideid;
    }
}

$_SESSION['idn']=$num;

$sres=htmlentities($_POST['resim'],ENT_QUOTES);
$sbas= htmlentities($_POST['slidebas'],ENT_QUOTES);
$sicer=htmlentities($_POST['slideicerik'],ENT_QUOTES);
$slinkk=htmlentities($_POST['link'],ENT_QUOTES);
$bstar=date('d')."-".date('m')."-".date("Y");
$bttar=$_POST['slidegun']."-".$_POST['slideay']."-".$_POST['slideyil'];

$sgunn=$_POST['slidegun'];
$sayy=$_POST['slideay'];
$syill=$_POST['slideyil'];

if($_POST['slideyil'] < date('Y') )
{
    include "slideeklevtbasarisiz2.php";
}
else if( $_POST['slideyil'] == date('Y') )
{
    if($_POST['slideay'] < date('m'))
    {
        include "slideeklevtbasarisiz2.php";
    }
    else if($_POST['slideay']== date('m'))
    {
        if($_POST['slidegun'] <= date('d'))
        {
            include "slideeklevtbasarisiz2.php";
        }
        else
        {
            $sql= "INSERT INTO slider(idn,sad,sbaslik,sicerik,bastarih,sgun,say,syil,slink,slideid) VALUES ('$num','$sres','$sbas','$sicer','$bstar','$sgunn','$sayy','$syill','$slinkk','$k')";

            $sonuc = $vt->query($sql);


            if($sonuc==0)
                include  "slideeklevtbasarisiz.php";
            else
                include "slideeklevtbasarili.php";

        }
    }
    else
    {
        $sql= "INSERT INTO slider(idn,sad,sbaslik,sicerik,bastarih,sgun,say,syil,slink,slideid) VALUES ('$num','$sres','$sbas','$sicer','$bstar','$sgunn','$sayy','$syill','$slinkk','$k')";

        $sonuc = $vt->query($sql);


        if($sonuc==0)
            include  "slideeklevtbasarisiz.php";
        else
            include "slideeklevtbasarili.php";

    }
}
else
{
    $sql= "INSERT INTO slider(idn,sad,sbaslik,sicerik,bastarih,sgun,say,syil,slink,slideid) VALUES ('$num','$sres','$sbas','$sicer','$bstar','$sgunn','$sayy','$syill','$slinkk','$k')";

    $sonuc = $vt->query($sql);


    if($sonuc==0)
        include  "slideeklevtbasarisiz.php";
    else
        include "slideeklevtbasarili.php";

}



?>

