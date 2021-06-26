<?php
require_once("header.php");
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();
if(isset($_POST["lid"]))
{
    $lid=$_POST["lid"];
    if(isset($_POST["approve"]))
    {
        $data["leave_status"]="a";
    }
    if(isset($_POST["reject"]))
    {
        $data["leave_status"]="r";
    }
    $dao->update($data,"tbl_leave","leave_id=$lid");
}

?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
    <center>
<?php

    if($cats = $dao->getData("*","tbl_leave","leave_status='p' order by leave_id desc"))
    {
        // var_dump($students);
        ?>

   
        <<table id="pkg" align="right">
                <tr>
                    <th>Trainer </th>
                    <th>From Date </th>
                    <th>To Date</th>
                    <th>Number of Days</th>
                    <th>Reason</th>
                    <th>Action</th>
                   

                </tr>
                <?php
                foreach($cats as $cat)
                {
                    $trid= $cat["leave_tr_id"];
                    $tr=$dao->getData("*","tbl_trainer","t_id=$trid")
                    ?>
                   
                    <tr>
                        <td><?php echo $tr[0]["t_fname"]." ".$tr[0]["t_lname"]; ?></td>
                        <td><?php echo $cat["leave_from"]; ?></td>
                        <td><?php echo $cat["leave_to"]; ?></td>
                        <td><?php echo $cat["leave_days"]; ?></td>
                        <td><?php echo $cat["leave_reason"]; ?></td>
                        <td>
                             <form method="post">
                            <input type="hidden" name="lid" value="<?= $cat["leave_id"] ?>">
                            <input class="btn btn-success" type="submit" name="approve" value="Approve">
                            <input class="btn btn-danger"  type="submit" name="reject" value="Reject">
                            </form>

                        </td>
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
