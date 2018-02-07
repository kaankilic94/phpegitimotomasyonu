<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Öğretmen Ekle</h2></div>

    <?php
    if($_POST){

        $isim=$_POST["isim"];
        $uzman=$_POST["uzman"];
        $email=$_POST["email"];
        $sifre=$_POST["sifre"];
        $ders=$_POST["ders"];

        if(!$isim ||  !$uzman ||  !$email ||  !$sifre ||  !$ders){
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen tüm alanları doldurunuz.</div>";

        }else{
            $r=$db->prepare("select * from admin where ad=?");
            $r->execute(array($isim));
            $t=$r->fetchAll(PDO::FETCH_ASSOC);
            $k=$r->rowCount();

            if($k){

                echo "<div style=\"margin: 15px; \" class=\"breadcrumb\"><span style='color: green'>$isim</span> ismi zaten var, lütfen başkar bir isim  giriniz.</div>";



            }else{
                $x=$db->prepare("insert into admin set
                                       ad=?,
                                        
                                             uzman=?,
                                             username=?,
                                             passw=?,
                                             uid=?");

                $x->execute(array($isim,$uzman,$email,$sifre,$ders));
                $y=$x->rowCount();
                if ($y){
                    echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Öğretmen başarıyla eklenmiştir.</div>";
                    header("refresh:1;url=/kou/administrator/?do=ogretmenler");
                }else{
                    echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Öğretmen eklenirken bir hata oluştu. Lütfen tekrar deneyin.</div>";
                }



            }

        }


    }else{

        ?>

        <form action="" method="post">

            <div style="margin: 28px;" class="form-group">

                <label for="comment">İsim</label>
                <input name="isim" type="text"  class="form-control"><br>

                <label for="comment">Alanı</label>
                <input name="uzman" type="text"  class="form-control"><br>

                <label for="comment">Email</label>
                <input name="email" type="text"  class="form-control"><br>

                <label for="comment">Şifre</label>
                <input name="sifre" type="text"  class="form-control"><br>

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