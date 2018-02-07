
<?php


error_reporting(0);

session_start();

$userisim=$_SESSION['mail'];
$usersif =$_SESSION['pass'];

$dbb = @new mysqli("localhost","root","","kou");
mysqli_set_charset($dbb, "utf8");


$hdbas=htmlentities($_POST['hduyurubas'],ENT_QUOTES);
$hdicer= htmlentities($_POST['hduyuruicerik'],ENT_QUOTES);
$hdlink= $_POST['hduyurulink'];
$hbaszaman=date('d')."-".date('m')."-".date("Y");
$hzaman=$_POST['hgun']."-".$_POST['hay']."-".$_POST['hyil'];

$hdgun=$_POST['hgun'];
$hday=$_POST['hay'];
$hdyil=$_POST['hyil'];

$x=1;

$sorr=$dbb->query("SELECT * FROM bolumhaber");

while ($row = $sorr->fetch_object())
{
    if($row->hid)
    {
        $x = $x + $row->hid;
    }
}


if($_POST['hyil'] < date('Y') )
{
    include "habereklevtbasarisiz2.php";
}
else if( $_POST['hyil'] == date('Y') )
{
    if($_POST['hay'] < date('m'))
    {
        include "habereklevtbasarisiz2.php";
    }
    else if($_POST['hay']==date('m'))
    {
        if($_POST['hgun'] <= date('d'))
        {
            include "habereklevtbasarisiz2.php";
        }
        else
        {
            $sqll= "INSERT INTO bolumhaber (hid,baslik,icerik,linkk,bastarihh,hgunn,hayy,hyill) VALUES ('$x','$hdbas','$hdicer','$hdlink','$hbaszaman','$hdgun','$hday','$hdyil')";

            $sonuc = $dbb->query($sqll);

            if($sonuc==0)
                include  "habereklevtbasarisiz.php";
            else
                include "habereklevtbasarili.php";
        }
    }
    else
    {
        $sqll= "INSERT INTO bolumhaber (hid,baslik,icerik,linkk,bastarihh,hgunn,hayy,hyill) VALUES ('$x','$hdbas','$hdicer','$hdlink','$hbaszaman','$hdgun','$hday','$hdyil')";

        $sonuc = $dbb->query($sqll);

        if($sonuc==0)
            include  "habereklevtbasarisiz.php";
        else
            include "habereklevtbasarili.php";
    }
}
else
{
    $sqll= "INSERT INTO bolumhaber (hid,baslik,icerik,linkk,bastarihh,hgunn,hayy,hyill) VALUES ('$x','$hdbas','$hdicer','$hdlink','$hbaszaman','$hdgun','$hday','$hdyil')";

    $sonuc = $dbb->query($sqll);

    if($sonuc==0)
        include  "habereklevtbasarisiz.php";
    else
        include "habereklevtbasarili.php";
}


?>

