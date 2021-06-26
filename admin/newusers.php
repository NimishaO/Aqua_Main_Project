<?php
require_once("header.php");
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

if(isset($_GET["id"]) && isset($_GET["action"]))
{
    $id=$_GET["id"];
    if($_GET["action"]=="a")
    {
        $dao->update(["status"=>'2'],"tbl_registration","reg_id=$id");
    }
    else
    {
         $dao->update(["status"=>'3'],"tbl_registration","reg_id=$id");
    }
}

?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php





    if($cats = $dao->getData("*","tbl_registration","status=1"))
    {
        // var_dump($students);
        ?>

   
        <table id="pkg" align="right">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    
                    <th>Approve</th>
                    <th>Reject</th>
                </tr>
                <?php
                foreach($cats as $cat)
                {
                    ?>

                    <tr>
                        <td><?php echo $cat["fname"]; ?></td>
                        <td><?php echo $cat["lname"]; ?></td>
                        <td><?php echo $cat["email"]; ?></td>
                        <td><?php echo $cat["gender"]; ?></td>
                        <td><?php echo $cat["address"]; ?></td>
                        <td><?php echo $cat["phone"]; ?></td>
                        
                        <td><a class="btn btn-success" href="newusers.php?id=<?php echo $cat["reg_id"]; ?>&action=a">Approve</a></td>
                        <td><a class="btn btn-warning" href="newusers.php?id=<?php echo $cat["reg_id"]; ?>&action=r">Reject</a></td>
                    </tr>

                    <?php
                }

                ?>


            </table>
            </center>
</html>

        <?php
    }
    else
    {
        echo "<h3>No New Users found :: </h3>";
    }


?>
">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
