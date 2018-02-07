<?php
$v=$db->prepare("select * from yorumlar order by yorum_id desc limit 30");
$v->execute(array());
$k=$v->fetchAll(PDO::FETCH_ASSOC);
$x=$v->rowCount();



?>

<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Yorumlar</h2></div>




    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Yorum ekleyen</th>
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

                        <td><?php echo $m["yorum_ekleyen"]; ?></td>

                        <td><?php

                            if($m["yorum_onay"]==1){
                               ?> <span  class="fa fa-check" style='color: green'>  </span> <?php
                            }else{
                                ?> <span  class="fa fa-times" style='color: red'> </span> <?php
                            }

                            ?></td>



                        <td><?php echo $m["yorum_tarih"]; ?></td>
                        <td> <span><a href="../administrator/?do=yorum_duzenle&id=<?php echo $m["yorum_id"]; ?>">düzenle</a></span>




                        </td>
                        <td>
                            <form style="display: inline;" action="../administrator/?do=yorum_sil" method="post">
                                <input type="checkbox"  name="sil[]" value="<?php echo $m["yorum_id"] ;?>">
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