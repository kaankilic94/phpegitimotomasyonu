<?php
$v=$db->prepare("select * from uyeler where uye_rutbe=? order by uye_id desc");
$v->execute(array(0));
$k=$v->fetchAll(PDO::FETCH_ASSOC);
$x=$v->rowCount();



?>

<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Üyeler</h2></div>





    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kullanıcı Adı</th>
                <th>Rutbe</th>
                <th>Onay</th>
                <th>Tarih</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
            </thead>
            <?php
            if($x){

                foreach ($k as $m){
                    ?>

                    <tbody>
                    <tr>
                        <td><?php echo $m["uye_adi"]; ?></td>
                        <td><?php

                                echo "<span  style='color: black'>Üye</span>";


                            ?></td>
                        <td><?php
                            if($m["uye_onay"]==1){
                                echo "<span class=\"fa fa-check\"  style='color: green'></span>";
                            }else{
                                echo "<span class=\"fa fa-times\" style='color: red'></span>";
                            }
                            ?></td>
                        <td><?php echo $m["uye_tarih"]; ?></td>
                        <td> <span><a href="../adminler/?do=uye_duzenle&id=<?php echo $m["uye_id"]; ?>">düzenle</a></span> </td>

                        <td>
                            <form style="display: inline;" action="../adminler/?do=uye_sil" method="post">
                                <input type="checkbox"  name="sil[]" value="<?php echo $m["uye_id"] ;?>">
                        </td>

                    </tr>
                    </tbody>

                    <?php
                }

            }else{

            }

            ?>
        </table>

        </table>
        <button type="submit" class="btn btn-primary">Sil</button>
    </div>


</div>