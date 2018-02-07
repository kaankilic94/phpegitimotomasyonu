<?php
$v=$db->prepare("select * from admin  order by id desc");
$v->execute(array());
$k=$v->fetchAll(PDO::FETCH_ASSOC);
$x=$v->rowCount();



?>

<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Öğretmenler <span style="float: right" ><a href="../administrator/?do=ogretmen_ekle"> Öğretmen Ekle </a></span></h2></div>





    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>İsim</th>
                <th>Kullanıcı adı</th>
                <th>Alan</th>
                <th>Düzenler</th>
                <th>Sil</th>
            </tr>
            </thead>
            <?php
            if($x){

                foreach ($k as $m){
                    ?>

                    <tbody>
                    <tr>
                        <td><?php echo $m["ad"]; ?></td>


                        <td><?php echo $m["username"]; ?></td>
                        <td><?php echo $m["uzman"]; ?></td>

                        <td> <span><a href="../administrator/?do=ogretmen_duzenle&id=<?php echo $m["id"]; ?>">düzenle</a></span> </td>

                        <td>
                            <form style="display: inline;" action="../administrator/?do=ogretmen_sil" method="post">
                                <input type="checkbox"  name="sil[]" value="<?php echo $m["id"] ;?>">
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