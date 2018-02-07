<?php

include "ayar.php";



$aranacak=@$_POST["uyeadi"];//kelimeyi alıyoruz.

$row=$db->prepare("select * from uyeler where uye_adi like ?");
$row->execute(array("%".$aranacak."%"));
$x=$row->fetchAll(PDO::FETCH_ASSOC);
$y=$row->rowCount();

if(!$aranacak){
    echo "Bu kullanıcı adı giriniz.";
}
else{
    if($y){

        foreach ($x as $m){


            echo  "<div class='kelime' onclick='tamamla(\"".$m["uye_adi"]."\")'>$m[uye_adi]</div>";
        }


    }else{

        echo "Bu kullanıcı adı bulunamadı.";
    }

}

//////////////




?>