<?php

if($_SESSION){

    if ($_POST){

        //Resim
        $maxBoyut=700000;
        $dosyaUzantisi=substr($_FILES["resim"]["name"],-4,4);
        $dosyaAdi= rand(1,99999).$dosyaUzantisi;
        $dosyaYolu="../dosya/".$dosyaAdi;
        //Resim

        $baslik= strip_tags($_POST["baslik"]);
        $kategori=$_POST["kategori"];
        $aciklama=$_POST["aciklama"];

        if(!$baslik  || !$aciklama){

            echo "<div class='well'>Lütfen boş alan bırakmayın!</div>";

        }elseif ($_FILES["resim"]["size"]>$maxBoyut){

            echo "<div class='well'>Resim boyutunuz çok fazla.</div>";

        }else{

            $dosya=$_FILES["resim"]["type"];



            $v=$db->prepare("select * from konular where konu_baslik=?");
            $v->execute(array($baslik));
            $x=$v->fetch(PDO::FETCH_ASSOC);
            $z=$v->rowCount();

            if($z){

                echo "<div class='well'>Bu konu başlığı daha önce kullanılmış lütfen başka bir başlık seçiniz.</div>";

            }elseif ($_FILES["resim"]["type"]!="image/jpeg" && $_FILES["resim"]["type"]!="image/png" ){

                echo "<div class='well'>Resim formatı png veya jpeg olmalıdır.</div>";

            }else{

                if (is_uploaded_file($_FILES["resim"]["tmp_name"])){

                    $tasi = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
                    if($tasi){

                        $x=$db->prepare("insert into konular set

                                 konu_baslik=?,
                                 konu_resim=?,
                                 konu_kategori=?,
                                 konu_aciklama=?,
                                 konu_ekleyen=?        

                                                                ");

                        $kayit=$x->execute(array($baslik,$dosyaYolu,$kategori,$aciklama,$_SESSION["uye"]));

                        if($kayit){
                            echo "<div class='well'>Konu başarıyla eklendi.</div>";
                        }else{
                            echo "<div class='well'>Konu eklenirken bir hata oluştu.</div>";
                        }

                    }else{

                        echo "<div class='well'>Dosya taşınırken bir hata oluştu</div>";


                    }

                }else{
                    echo "<div class='well'>Dosya taşınırken bir hata oluştu</div>";
                }




            }

        }


    }else{

         ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h2 style="color: lightblue">Konu Ekle</h2><hr>
                <label for="comment">Başlık:</label>
                <input name="baslik" type="text" class="form-control">
                <label for="comment">Resim:</label>
                <input style="width: 220px;" name="resim" type="file">
                <label for="comment">Kategori:</label>

                <li style="list-style-type: none;">
                    <select name="kategori" style="width: 150px ; margin-bottom: 5px;">
                        <?php
                        $v=$db->prepare("select * from kategoriler");
                        $v->execute(array());
                        $x=$v->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($x as $m){
                            echo "<option value='".$m["kategori_id"]."'>".$m["kategori_adi"]."</option>";
                        }

                        ?>
                    </select>
                </li>
                <label for="comment">Açıklama:</label><br>


                <textarea name="aciklama" class="ckeditor" rows="5" id="comment"></textarea><br/>
                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>


         <?php

    }


}else{


    echo "<div class='well'>Konu eklemek için lütfen üye olunuz!</div>";
}








?>