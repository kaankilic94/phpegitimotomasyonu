<?php

if ($_SESSION){

    $v=$db->prepare("select * from mesajlar where mesaj_kime=? order by mesaj_id desc");
    $v->execute(array($_SESSION["id"]));
    $c=$v->fetchAll(PDO::FETCH_ASSOC);
    $x=$v->rowCount();

    echo "<div class='well' style='padding: 0px;' >
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;Mesajlarım <span style='float: right';><a href='?do=mesaj_gonder'>Mesaj gönder&nbsp;&nbsp;&nbsp;&nbsp;</a></span></h4>
 
 </div>";

    if ($x){

        foreach ($c as $m){

            if($m["mesaj_kime"]==$_SESSION["id"]){

               if($m["mesaj_okunma"]==1){
                   ?>
                   <div class='well' style="background: #CFF7D4">

                       <li style="list-style-type: none;">
                           <a href="?do=mesaj_oku&id=<?php echo $m["mesaj_id"];?>">
                               <span style="font-weight: bold;">Gönderen:</span><?php echo $m["mesaj_gonderen"];?>
                               <span style="font-weight: bold;">Başlık:</span><?php echo   mb_substr($m["mesaj_baslik"],0,30);?></a>
                           <span style="float: right;"><?php echo   $m["mesaj_tarih"];?><span style="font-weight: bold;"><a href="?do=mesaj_sil&id=<?php echo $m["mesaj_id"]; ?>">&nbsp;&nbsp;sil</a></span></span>

                       </li>

                   </div>
                   <?php
               }else{
                   ?>
                   <div class='well' >

                       <li style="list-style-type: none;">
                           <a href="?do=mesaj_oku&id=<?php echo $m["mesaj_id"];?>">
                               <span style="font-weight: bold;">Gönderen:</span><?php echo $m["mesaj_gonderen"];?>
                               <span style="font-weight: bold;">Başlık:</span><?php echo   mb_substr($m["mesaj_baslik"],0,30);?></a>
                           <span style="float: right;"><?php echo   $m["mesaj_tarih"];?><span style="font-weight: bold;"><a href="?do=mesaj_sil">&nbsp;&nbsp;sil</a></span></span>

                       </li>

                   </div>
                   <?php
               }



            }else{
                echo "<div class='well'>Bu sayfaya giriş yetkiniz yok.</div>";
            }

        }

    }else{
        echo "<div class='well'>Mesajınız bulunmuyor.</div>";
    }
}





?>


