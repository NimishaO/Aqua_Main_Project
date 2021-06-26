<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main"><?php
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<?php

    if($cats = $dao->getData("*","tbl_equipment","e_status!=3"))
    {
        // var_dump($students);
        ?>

          <table id="pkg" align="right">
                <tr>

                    <th>Equipment Name</th>
                    <th>Price</th>
                    <th>Image</th>
                     <th>Qty</th>
                    <th>update</th><br>

                </tr>
                <?php
                foreach($cats as $cat)
                {
                    ?>

                    <tr>
                        <td><?php echo $cat["e_name"]; ?></td>
                        <td><?php echo $cat["e_price"]; ?></td>
                        <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["e_img"]; ?>" /> <br> <?php echo $cat["e_img"]; ?> </td>
                        <td><?php echo $cat["e_qnty"]; ?></td>
                        <td><a class="btn btn-warning" href="updateequipment.php?id=<?php echo $cat["e_id"]; ?>">Update</a></td>
                    </tr>

                    <?php
                }

                ?>

            </table>

        <?php
    }
    else
    {
        echo "<h3>No categoriid found :: </h3>";
    }


?>
">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
