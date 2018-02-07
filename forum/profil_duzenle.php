<?php


if($_SESSION){

    $uye=@$_GET["uye"];

    if ($_SESSION["uye"]==$uye){

        $v=$db->prepare("select * from uyeler where uye_adi=?");
        $v->execute(array($uye));
        $m=$v->fetch(PDO::FETCH_ASSOC);
        $x=$v->rowCount();

        if($x){

            if($_POST){

                //Resim
                $maxBoyut=700000;
                $dosyaUzantisi=substr($_FILES["resim"]["name"],-4,4);
                $dosyaAdi= rand(1,99999).$dosyaUzantisi;
                $dosyaYolu="../dosya/".$dosyaAdi;
                //Resim

                $sifre=$_POST["sifre"];
                $email=$_POST["email"];
                $facebook=$_POST["fcb"];
                $twitter=$_POST["twt"];
                $sehir=$_POST["sehir"];
                $dgunu=$_POST["bday"];
                $hakkimda=$_POST["hakkimda"];

                if (!$email || !$dgunu || !$sehir ){

                    echo "<div class='well'>Lütfen gerekli alanları boş bırakmayınız.</div>";


                }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){

                    echo "<div class='well'>Lütfen formata uygun bir email adresi giriniz.</div>";
                }elseif ($_FILES["resim"]["size"]>$maxBoyut){

                    echo "<div class='well'>Resim boyutunuz çok fazla.</div>";

                }else{

                    if($sifre){
                        $sifre=md5($sifre);
                    }else{
                        $sifre=$m["uye_sifre"];
                    }

                    $dosya=$_FILES["resim"]["type"];

                   if (is_uploaded_file($_FILES["resim"]["tmp_name"])){

                       $tasi=move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);

                       if($tasi){
                           $guncelle=$db->prepare("update uyeler set
                                            uye_sifre=?,
                                            uye_eposta=?,
                                            uye_facebook=?,
                                            uye_twitter=?,
                                            uye_sehir=?,
                                            uye_dgunu=?,
                                            uye_hakkimda=?,
                                             uye_resim=? where uye_adi=?
                
                
                                                                           ");

                           $kayit= $guncelle->execute(array($sifre,$email,$facebook,$twitter,$sehir,$dgunu,$hakkimda,$dosyaYolu,$_SESSION["uye"]));

                           if($kayit){
                               echo "<div class='well'>Profil başarıyla güncellendi.</div>";
                               header("refresh: 2 ; url=?do=profil&uye=$uye ");
                           }else{
                               echo "<div class='well'>Profil güncellenirken bir hata oluştu.</div>";
                           }
                       }else{
                           echo "<div class='well'>Dosya taşınırken bir hata oluştu</div>";
                       }

                   }else{
                       echo "<div class='well'>Dosya taşınırken bir hata oluştu</div>";

                   }
                }





            }else{
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h2 style="color: lightblue">Düzenle</h2><hr>



                        <label for="comment">Şifre:</label>
                        <input  name="sifre" type="text" class="form-control " placeholder="Yeni şifrenizi giriniz...">

                        <label for="comment">Email:</label>
                        <input name="email" value="<?php echo $m["uye_eposta"] ; ?>" type="text" class="form-control">

                        <label for="comment">Profil Foto:</label>
                        <input type="file"  name="resim" >

                        <label for="comment">Facebook:</label>
                        <input name="fcb" value="<?php echo $m["uye_facebook"] ; ?>" type="text" class="form-control">

                        <label for="comment">Twitter:</label>
                        <input name="twt" value="<?php echo $m["uye_twitter"] ; ?>" type="text" class="form-control">

                        <label style="margin-top: 5px;" for="comment">Şehir:</label><br>
                        <select style="margin-bottom: 10px; margin-top: 10px;" name="sehir">
                            <option value="0">------</option>
                            <option value="Adana" selected>Adana</option>
                            <option value="Adıyaman">Adıyaman</option>
                            <option value="Afyonkarahisar">Afyonkarahisar</option>
                            <option value="Ağrı">Ağrı</option>
                            <option value="Amasya">Amasya</option>
                            <option value="Ankara">Ankara</option>
                            <option value="Antalya">Antalya</option>
                            <option value="Artvin">Artvin</option>
                            <option value="Aydın">Aydın</option>
                            <option value="Balıkesir">Balıkesir</option>
                            <option value="Bilecik">Bilecik</option>
                            <option value="Bingöl">Bingöl</option>
                            <option value="Bitlis">Bitlis</option>
                            <option value="Bolu">Bolu</option>
                            <option value="Burdur">Burdur</option>
                            <option value="Bursa">Bursa</option>
                            <option value="Çanakkale">Çanakkale</option>
                            <option value="Çankırı">Çankırı</option>
                            <option value="Çorum">Çorum</option>
                            <option value="Denizli">Denizli</option>
                            <option value="Diyarbakır">Diyarbakır</option>
                            <option value="Edirne">Edirne</option>
                            <option value="Elazığ">Elazığ</option>
                            <option value="Erzincan">Erzincan</option>
                            <option value="Erzurum">Erzurum</option>
                            <option value="Eskişehir">Eskişehir</option>
                            <option value="Gaziantep">Gaziantep</option>
                            <option value="Giresun">Giresun</option>
                            <option value="Gümüşhane">Gümüşhane</option>
                            <option value="Hakkari">Hakkâri</option>
                            <option value="Hatay">Hatay</option>
                            <option value="Isparta">Isparta</option>
                            <option value="Mersin">Mersin</option>
                            <option value="İstanbul">İstanbul</option>
                            <option value="İzmir">İzmir</option>
                            <option value="Kars">Kars</option>
                            <option value="Kastamonu">Kastamonu</option>
                            <option value="Kayseri">Kayseri</option>
                            <option value="Kırklareli">Kırklareli</option>
                            <option value="Kırşehir">Kırşehir</option>
                            <option value="Kocaeli">Kocaeli</option>
                            <option value="Konya">Konya</option>
                            <option value="Kütahya">Kütahya</option>
                            <option value="Malatya">Malatya</option>
                            <option value="Manisa">Manisa</option>
                            <option value="Kahramanmaraş">Kahramanmaraş</option>
                            <option value="Mardin">Mardin</option>
                            <option value="Muğla">Muğla</option>
                            <option value="Muş">Muş</option>
                            <option value="Nevşehir">Nevşehir</option>
                            <option value="Niğde">Niğde</option>
                            <option value="Ordu">Ordu</option>
                            <option value="Rize">Rize</option>
                            <option value="Sakarya">Sakarya</option>
                            <option value="Samsun">Samsun</option>
                            <option value="Siirt">Siirt</option>
                            <option value="Sinop">Sinop</option>
                            <option value="Sivas">Sivas</option>
                            <option value="Tekirdağ">Tekirdağ</option>
                            <option value="Tokat">Tokat</option>
                            <option value="Trabzon">Trabzon</option>
                            <option value="Tunceli">Tunceli</option>
                            <option value="Şanlıurfa">Şanlıurfa</option>
                            <option value="Uşak">Uşak</option>
                            <option value="Van">Van</option>
                            <option value="Yozgat">Yozgat</option>
                            <option value="Zonguldak">Zonguldak</option>
                            <option value="Aksaray">Aksaray</option>
                            <option value="Bayburt">Bayburt</option>
                            <option value="Karaman">Karaman</option>
                            <option value="Kırıkkale">Kırıkkale</option>
                            <option value="Batman">Batman</option>
                            <option value="Şırnak">Şırnak</option>
                            <option value="Bartın">Bartın</option>
                            <option value="Ardahan">Ardahan</option>
                            <option value="Iğdır">Iğdır</option>
                            <option value="Yalova">Yalova</option>
                            <option value="Karabük">Karabük</option>
                            <option value="Kilis">Kilis</option>
                            <option value="Osmaniye">Osmaniye</option>
                            <option value="Düzce">Düzce</option>

                        </select><br>

                        <label for="comment">Doğum Tarihi:</label>
                        <input  name="bday" value="<?php echo $m["uye_dgunu"] ; ?>" type="text" class="form-control " placeholder="GG/AA/YYYY">


                        <label for="comment">Hakkımda:</label>
                        <textarea name="hakkimda" class="form-control" rows="5" id="comment"><?php echo $m["uye_hakkimda"] ; ?></textarea><br/>



                        <button  type="submit" class="btn btn-info">Gönder</button>
                    </div>
                </form>
                <?php

            }


        }else{

            echo "<div class='well'>Bu üye sistemde bulunamadı.</div>";
        }


    }else{

        echo "<div class='well'>Bu sayfaya giriş yetkiniz yok.</div>";
        die();
        session_destroy();
    }

}


?>