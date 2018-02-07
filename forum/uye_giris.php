<?php

if($_POST){

    $name=trim($_POST["name"]);
    $sifre=trim($_POST["sifre"]);

    if(!$name || !$sifre){

        echo "<div class='well'>Kullanıcı adı ve şifre boş bırakılamaz!</div>";


    }else{

        $sifre=md5($sifre);

        $uye=$db->prepare("select * from uyeler where uye_adi=? and uye_sifre=? and uye_onay=?");
        $uye->execute(array($name,$sifre,1));
        $z=$uye->fetch(PDO::FETCH_ASSOC);
        $x=$uye->rowCount();

        if($x){

            $_SESSION["uye"]= $z["uye_adi"];
            $_SESSION["eposta"]= $z["uye_eposta"];
            $_SESSION["rutbe"]= $z["uye_rutbe"];
            $_SESSION["id"]= $z["uye_id"];

            header("location:index.php");


        }elseif($z["uye_onay"]==0){
            echo "<div class='well'>Kullanıcı adı veya şifrenizi yanlış girmiş olabilirsiniz veya üyeliğiniz onaylanmamış olabilir.</div>";
        }else{
            echo "<div class='well'>Kullanıcı adı veya şifreniz yanlış!</div>";
        }

    }

}


?>