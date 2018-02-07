<?php

if($_SESSION){


    $id=(int)$_GET["id"];
    $v=$db->prepare("select * from mesajlar where mesaj_id=? and mesaj_kime=?");
    $v->execute(array($id,$_SESSION["id"]));
    $m=$v->fetch(PDO::FETCH_ASSOC);
    $x=$v->rowCount();

    if($x){
         $z=$db->prepare("update mesajlar set mesaj_okunma=? where mesaj_id=? and mesaj_kime=?");
         $z->execute(array(1,$id,$_SESSION["id"]));
        ?>

        <div class='well'>
           <h4 style="margin: -5px;"> <span style="font-weight: bold;">Başlık:</span> <?php echo mb_substr($m["mesaj_baslik"],0,40);?><span style=" float: right;">
                   <span style="font-weight: bold;">Gönderen:&nbsp;</span><?php  echo $m["mesaj_gonderen"];?></span><hr>


               <p class="tasma_engelle">

                   <?php echo nl2br($m["mesaj_aciklama"]);  ?>
               </p>

           </h4>


        </div>



        <?php


    }else{

        echo "<div class='well'>Bu mesajı okuma yetkiniz yok.</div>";
    }

}

?>