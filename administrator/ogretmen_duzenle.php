<?php  $id=@$_GET["id"];

$v=$db->prepare("select * from admin where id=?");
$v->execute(array($id));
$m=$v->fetch(PDO::FETCH_ASSOC);


?>


<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Öğretmen Düzenle</h2></div>

    <?php

    if($_POST){

        $isim=$_POST["isim"];
        $uzman=$_POST["uzman"];
        $email=$_POST["email"];
        $sifre=$_POST["sifre"];
        $ders=$_POST["ders"];

        if(!$isim ||  !$uzman ||  !$email ||  !$sifre ||  !$ders){

            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen boş alan bırakmayın.</div>";

        }else{
            $guncelle=$db->prepare("update admin set 

                                             ad=?,
                                        
                                             uzman=?,
                                             username=?,
                                             passw=?,
                                             uid=? where id=?");

            $update=$guncelle->execute(array($isim,$uzman,$email,$sifre,$ders,$id));
            if($update){
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Bilgiler başarıyla düzenlenmiştir.</div>";
                header("refresh: 2; url=/kou/administrator/?do=ogretmenler");
            }else{
                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Bilgiler düzenlenirken bir hata oluştu.</div>";
            }
        }





    }else{
        ?>

        <form action="" method="post">

            <div style="margin: 28px;" class="form-group">

                <label for="comment">İsim</label>
                <input name="isim" type="text" value="<?php echo $m["ad"]; ?>" class="form-control"><br>

                <label for="comment">Alanı</label>
                <input name="uzman" type="text" value="<?php echo $m["uzman"]; ?>" class="form-control"><br>

                <label for="comment">Email</label>
                <input name="email" type="text" value="<?php echo $m["username"]; ?>" class="form-control"><br>

                <label for="comment">Şifre</label>
                <input name="sifre" type="text" value="<?php echo $m["passw"]; ?>" class="form-control"><br>

                <label for="comment">Ders Yetkisi</label>
                <li style="list-style-type: none;">
                    <select style="margin-bottom: 10px; margin-top: 10px;" name="ders">
                        <option value="1">Matematik</option>
                        <option value=2">Fen Bilimleri</option>
                        <option value="3">Tarih</option>
                        <option value="4">Coğrafya</option>
                        <option value="5">İdare</option>

                    </select><br>


                    </select>
                </li><br>





                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>

        <?php
    }
    ?>
</div>