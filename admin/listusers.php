<?php
require_once("header.php");
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php





    if($cats = $dao->getData("*","tbl_registration","status=2"))
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
