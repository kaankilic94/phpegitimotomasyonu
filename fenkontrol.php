

<?php
error_reporting(0);

session_start();

/*$userisim=$_SESSION['mail'];
$usersif =$_SESSION['pass'];*/


$vt = @new mysqli("localhost","root","","kou");
mysqli_set_charset($vt, "utf8");

//soru id'leri tut

$y=0;

$so=$_POST['soruid'];
$cev=$_POST['dogruu'];


$sqll=$vt->query("SELECT * FROM fen WHERE tid=$so");

while ($row = $sqll->fetch_object())
{
    if($row->dogru == $cev)
    {
        include "fenyazbasarili.php";
    }
    else
    {
        include "fenyazbasarisiz.php";
    }
}
/*while($soruid=$_POST['soruid'][$y])
{
    $soru=$soruid[$y];
    $cevap=$_POST['dogruu'][$y];//kullanıcının verdiği cevap
    $sor=$vt->query("SELECT * FROM test WHERE tid=$soru");//veritabanı sorgusu
    $dogrucevap=$sor['dogru'];//veritabanındaki dogru cevap
    if($cevap==$dogrucevap){//kontrol

        echo "dogru";

    }else{
        echo "yanlış";
    }

    $y++;

}*/


/*for($i=0; $i<(count($soruid)); $i++){

    $soru=$soruid[$i];//soru[0]=1,....
    $cevap=$_POST['dogruu'][$i];//kullanıcının verdiği cevap
    $sor=$vt->query("SELECT * FROM test WHERE tid=$soru");//veritabanı sorgusu
    $row=$sor->fetch_object();
    $dogrucevap=$sor['dogru'];//veritabanındaki dogru cevap
    if($cevap==$dogrucevap){//kontrol

        echo "dogru";

}else{
        echo "yanlış";
}

}*/

?>