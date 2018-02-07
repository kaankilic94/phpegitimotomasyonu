<?php  $id=@$_GET["id"];

$v=$db->prepare("select * from kategoriler where kategori_id=?");
$v->execute(array($id));
$m=$v->fetch(PDO::FETCH_ASSOC);


?>


<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Kategori Düzenle</h2></div>

    <?php

    if($_POST){

        $adi=$_POST["isim"];
        $aciklama=$_POST["aciklama"];


        if(!$adi|| !$aciklama){

            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen boş alan bırakmayın.</div>";

        }else{
            $guncelle=$db->prepare("update kategoriler set 

                                             kategori_adi=?,
                                             kategori_aciklama=?
                                            where kategori_id=?");

            $update=$guncelle->execute(array($adi,$aciklama,$id));
            if($update){
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategori başarıyla düzenlenmiştir.</div>";
                header("refresh: 2; url=/kou/adminler/?do=kategoriler");
            }else{
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategori düzenlenirken bir hata oluştu.</div>";
            }
        }





    }else{
        ?>

        <form action="" method="post">

            <div style="margin: 28px;" class="form-group">

                <label for="comment">Kategori Adı:</label>
                <input name="isim" type="text" value="<?php echo $m["kategori_adi"]; ?>" class="form-control"><br>

                <label for="comment">Açıklama:</label>
                <textarea name="aciklama" class="form-control" rows="5" id="comment"><?php echo $m["kategori_aciklama"];?></textarea><br/>



                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>

        <?php
    }
    ?>
</div>