<?php
$v=$db->prepare("select * from kategoriler order by kategori_id desc limit 30");
$v->execute(array());
$k=$v->fetchAll(PDO::FETCH_ASSOC);
$x=$v->rowCount();



?>

<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Kategoriler <span style="float: right" ><a href="../administrator/?do=kategori_ekle"> Kategori Ekle </a></span></h2></div>





    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kategori Adı</th>
                <th>Açıklama</th>
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
                        <td><?php echo $m["kategori_adi"]; ?></td>
                        <td><?php echo $m["kategori_aciklama"]; ?></td>


                        <td> <span><a href="../administrator/?do=kategori_duzenle&id=<?php echo $m["kategori_id"]; ?>">düzenle</a></span></td>

                        <td>
                            <form style="display: inline;" action="../administrator/?do=kategori_sil" method="post">
                                <input type="checkbox"  name="sil[]" value="<?php echo $m["kategori_id"] ;?>">
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