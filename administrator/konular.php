<?php
$v=$db->prepare("select * from konular inner join kategoriler on kategoriler.kategori_id = konular.konu_kategori order by konu_id desc limit 30");
$v->execute(array());
$k=$v->fetchAll(PDO::FETCH_ASSOC);
$x=$v->rowCount();



?>

<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Konular</h2></div>





    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Başlık</th>
                <th>Kategori</th>
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
                        <td><?php echo $m["konu_baslik"]; ?></td>
                        <td><?php echo $m["kategori_adi"]; ?></td>
                        <td><?php
                            if($m["konu_durum"]==1){
                                echo "<span class=\"fa fa-check\"  style='color: green'></span>";
                            }else{
                                echo "<span class=\"fa fa-times\" style='color: red'></span>";
                            }
                            ?></td>
                        <td><?php echo $m["konu_tarih"]; ?></td>
                        <td> <span><a href="../administrator/?do=konu_duzenle&id=<?php echo $m["konu_id"]; ?>">düzenle</a></span> </td>

                        <td>
                            <form style="display: inline;" action="../administrator/?do=konu_sil" method="post">
                                <input type="checkbox"  name="sil[]" value="<?php echo $m["konu_id"] ;?>">
                        </td>

                    </tr>
                    </tbody>

                    <?php
                }

            }else{

            }

            ?>
        </table>
        <button type="submit" class="btn btn-primary">Sil</button>
        </form>
    </div>


</div>