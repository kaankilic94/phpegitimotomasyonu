<?php


if(!$_SESSION){

    if($_POST){

        //Resim
        $maxBoyut=700000;
        $dosyaUzantisi=substr($_FILES["resim"]["name"],-4,4);
        $dosyaAdi= rand(1,99999).$dosyaUzantisi;
        $dosyaYolu="../dosya/".$dosyaAdi;
        //Resim

        $isim=strip_tags(trim($_POST["isim"]));
        $sifre=strip_tags(trim($_POST["sifre"]));
        $email=trim($_POST["email"]);
        $hakkimda=strip_tags($_POST["hakkimda"]);
        $sehir=$_POST["sehir"];
        $facebook=$_POST["fcb"];
        $twitter=$_POST["twt"];
        $dgunu=$_POST["bday"];


        if(!$isim || !$sifre || !$email){

            echo "<div class='well'>Lütfen boş alan bırakmayınız.</div>";

        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "<div class='well'>Lütfen formata uygun bir email adresi giriniz.</div>";

        }elseif ($_FILES["resim"]["size"]>$maxBoyut){

            echo "<div class='well'>Resim boyutunuz çok fazla.</div>";

        }else{

            $dosya=$_FILES["resim"]["type"];

            $sifre=md5($sifre);
            $v=$db->prepare("select * from uyeler where uye_adi=?");
            $v->execute(array($isim));
            $x=$v->fetch(PDO::FETCH_ASSOC);
            $y=$v->rowCount();

            if($y){

                echo "<div class='well'><span style='color: #c9302c'>".$x["uye_adi"]."</span> adlı üye sistemde var. Başka bir kullanıcı adı giriniz.</div>";

            }elseif ($_FILES["resim"]["type"]!="image/jpeg" && $_FILES["resim"]["type"]!="image/png" ){

                echo "<div class='well'>Resim formatı png veya jpeg olmalıdır.</div>";

            }else{

            if(is_uploaded_file($_FILES["resim"]["tmp_name"])){

                $tasi=move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);

                if ($tasi){
                    $x=$db->prepare("insert into uyeler set
                                   uye_adi=?,
                                   uye_sifre=?,
                                   uye_eposta=?,
                                   uye_hakkimda=?,
                                   uye_sehir=?,
                                   uye_facebook=?,
                                   uye_twitter=?,
                                   uye_dgunu=?,
                                   uye_resim=?
                                                         
                                                         ");

                    $kayit= $x->execute(array($isim,$sifre,$email,$hakkimda,$sehir,$facebook,$twitter,$dgunu,$dosyaYolu));

                    if($kayit){

                        echo "<div class='well'>Başarıyla kayıt oldunuz.</div>";
                    }else{

                        echo "<div class='well'>Üye olurkan bir hata oluştu.</div>";


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
                <h2 style="color: lightblue">Kayıt Formu</h2><hr>

                <label for="comment">Kullanıcı adı:</label>
                <input name="isim" type="text" class="form-control">

                <label for="comment">Şifre:</label>
                <input  name="sifre" type="text" class="form-control " placeholder="Şifrenizi girin.">

                <label for="comment">Email:</label>
                <input name="email" type="text" class="form-control">

                <label for="comment">Profil Fotoğrafı:</label>
                <input style="width: 220px;" name="resim" type="file">

                <label for="comment">Facebook:</label>
                <input name="fcb" type="text" class="form-control">

                <label for="comment">Twitter:</label>
                <input name="twt" type="text" class="form-control">

                <label style="margin-top: 5px;" for="comment">Şehir:</label><br>
                <select style="margin-bottom: 10px; margin-top: 10px;" name="sehir">
                    <option value="0">------</option>
                    <option value="Adana">Adana</option>
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
                <input  name="bday" type="text" class="form-control " placeholder="GG/AA/YYYY">


                <label for="comment">Hakkımda:</label>
                <textarea name="hakkimda" class="form-control" rows="5" id="comment"></textarea><br/>



                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>
        <?php

    }

}


?>