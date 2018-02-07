<?php  $id=@$_GET["id"];

$v=$db->prepare("select * from yorumlar where yorum_id=?");
$v->execute(array($id));
$m=$v->fetch(PDO::FETCH_ASSOC);


?>
<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Yorum Düzenle</h2></div>

    <?php

    if($_POST){

        $mesaj=$_POST["mesaj"];
        $onay=$_POST["onay"];


        if(!$mesaj){

            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen boş alan bırakmayın.</div>";

        }else{
            $guncelle=$db->prepare("update yorumlar set 

                                             yorum_mesaj=?,                                       
                                             yorum_onay=? where yorum_id=?");

            $update=$guncelle->execute(array($mesaj,$onay,$id));
            if($update){
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Yorum başarıyla düzenlenmiştir.</div>";
                header("refresh: 2; url=/kou/adminler/?do=yorumlar");
            }else{
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Yorum düzenlenirken bir hata oluştu.</div>";
            }
        }





    }else{
        ?>

        <form action="" method="post">
            <div style="margin: 28px;" class="form-group">



                <label for="comment">Yorum:</label>
                <textarea name="mesaj" class="form-control" rows="5" id="comment"><?php echo strip_tags($m["yorum_mesaj"]);?></textarea><br/>





                <li style="list-style-type: none;">
                    <select name="onay" >
                        <?php
                        if($m["yorum_onay"]==1){
                            ?> <option value="1" >Onay</option>
                            <option value="0" >Ret</option><?php

                        }else{
                            ?><option value="0" >Ret</option>
                            <option value="1" >Onay</option><?php
                        }
                        ?>


                    </select>
                </li><br/>

                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>

        <?php
    }
    ?>
</div>