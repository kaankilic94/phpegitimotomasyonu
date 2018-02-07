<?php  $id=@$_GET["id"];

$v=$db->prepare("select * from uyeler where uye_id=?");
$v->execute(array($id));
$m=$v->fetch(PDO::FETCH_ASSOC);


?>
<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Üye Düzenle</h2></div>

    <?php

    if($_POST){


        $rutbe=$_POST["rutbe"];
        $onay=$_POST["onay"];






            $guncelle = $db->prepare("update uyeler set 

                                            
                                             uye_rutbe=?,
                                             uye_onay=?
                                             where uye_id=?");

                $update = $guncelle->execute(array($rutbe, $onay, $id));
                if ($update) {
                    echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Üye bilgileri başarıyla düzenlenmiştir.</div>";
                    header("refresh: 2; url=/kou/administrator/?do=uyeler");
                } else {
                    echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Üye bilgileri düzenlenirken bir hata oluştu.</div>";
                }








    }else{
        ?>

        <form action="" method="post">
            <div style="margin: 28px;" class="form-group">


                <label for="comment">Rütbe:</label>

                <li style="list-style-type: none;">
                    <select name="rutbe" >
                        <?php  if ($m["uye_rutbe"]==1){
                            ?><option value="1" >Moderatör</option> <option value="0" >Üye</option><?php

                        }else{

                            ?> <option value="0" >Üye</option><option value="1" >Moderatör</option><?php
                        }




                            ?>



                    </select>
                </li><br/>

                <label for="comment">Onay:</label>

                <li style="list-style-type: none;">
                    <select name="onay" >
                        <?php  if ($m["uye_onay"]==1){
                            ?><option value="1" >Onay</option> <option value="0" >Ret</option><?php

                        }else{

                            ?> <option value="0" >Ret</option><option value="1" >Onay</option><?php
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