<?php  $id=@$_GET["id"];

$v=$db->prepare("select * from konular where konu_id=?");
$v->execute(array($id));
$m=$v->fetch(PDO::FETCH_ASSOC);


?>


<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Konu Düzenle</h2></div>

    <?php

    if($_POST){

        $baslik=$_POST["baslik"];

        $kategori=$_POST["kategori"];
        $aciklama=$_POST["aciklama"];
        $onay=$_POST["onay"];
        $ekleyen=$m["konu_ekleyen"];

        if(!$baslik ||  !$aciklama){

            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen boş alan bırakmayın.</div>";

        }else{
            $guncelle=$db->prepare("update konular set 

                                             konu_baslik=?,
                                             
                                             konu_kategori=?,
                                             konu_aciklama=?,
                                             konu_durum=?,
                                             konu_ekleyen=? where konu_id=?");

            $update=$guncelle->execute(array($baslik,$kategori,$aciklama,$onay,$ekleyen,$id));
            if($update){
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Konu başarıyla düzenlenmiştir.</div>";
                header("refresh: 2; url=/kou/administrator/?do=konular");
            }else{
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Konu düzenlenirken bir hata oluştu.</div>";
            }
        }





    }else{
       ?>

        <form action="" method="post">

            <div style="margin: 28px;" class="form-group">

                <label for="comment">Başlık:</label>
                <input name="baslik" type="text" value="<?php echo $m["konu_baslik"]; ?>" class="form-control"><br>

                <label for="comment">Açıklama:</label>
                <textarea name="aciklama" class="form-control" rows="5" id="comment"><?php echo $m["konu_aciklama"];?></textarea><br/>






                <label for="comment">Kategori:</label>

                <li style="list-style-type: none;">
                    <select  name="kategori" style="width: 150px ; margin-bottom: 5px;">

                        <?php
                        $v=$db->prepare("select * from kategoriler");
                        $v->execute(array());
                        $x=$v->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($x as $m){
                            echo "<option value='".$m["kategori_id"]."'>".$m["kategori_adi"]."</option>";

                        }


                        ?>

                    </select>
                </li><br>

                <?php

                $v=$db->prepare("select * from konular where konu_id=?");
                $v->execute(array($id));
                $z=$v->fetch(PDO::FETCH_ASSOC);


                ?>

                <label for="comment">Onay:</label>
                <li style="list-style-type: none;">
                    <select name="onay" >
                  <?php
                  if ($z["konu_durum"]==1){
                      ?> <option value="1">Onay</option>
                      <option value="0">Ret</option><?php
                  }else{
                      ?> <option value="0">Ret</option>
                      <option value="1">Onay</option><?php
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