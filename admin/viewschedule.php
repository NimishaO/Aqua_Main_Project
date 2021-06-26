<?php
require_once("header.php");
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
    <center>
<?php

    if($cats = $dao->getData("*","tbl_schedule"))
    {

        ?>


        <table id="pkg" align="right">
                <tr>
                    <th>Trainer </th>
                    <th>From Time </th>
                    <th>To Time</th>
                    <th>Shift</th>
                    <th>Duty</th>
                    <th>Days</th>



                </tr>
                <?php
                foreach($cats as $cat)
                {
                    $trid= $cat["sch_tr_id"];
                    $tr=$dao->getData("*","tbl_trainer","t_id=$trid");
                    ?>

                    <tr>
                        <td><?php echo $tr[0]["t_fname"]." ".$tr[0]["t_lname"]; ?></td>
                        <td><?php echo $cat["sch_from"]; ?></td>
                        <td><?php echo $cat["sch_to"]; ?></td>
                        <td><?php echo $cat["shift"]; ?></td>
                        <td><?php echo $cat["duty"]; ?></td>
                        <td><?php echo $cat["sch_days"]; ?></td>


                    </tr>

                    <?php
                }

                ?>


            </table>



        <?php
    }
    else
    {
        echo "<h3>No Leave Applications found </h3>";
    }


?>
 </center>

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
