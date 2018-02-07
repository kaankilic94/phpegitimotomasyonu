<?php


if($_SESSION){
    $id=@$_GET["id"];
    $v=$db->prepare("delete from mesajlar  where mesaj_id=? and mesaj_kime=?");
    $sil=$v->execute(array($id,$_SESSION["id"]));
    $x=$v->rowCount();

    if($x){

        if($sil){
            echo "<div class='well'>Mesaj başarıyla silindi.</div>";
        }else{

            echo "<div class='well'>Mesaj silinemedi lütfen tekrar deneyin.</div>";
        }


    }else{

        echo "<div class='well'>Bu mesajı silme yetkiniz yok.</div>";
    }

}

?>