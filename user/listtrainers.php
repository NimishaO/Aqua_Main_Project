<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class=" <?php
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<?php

    if($cats = $dao->getData("*","tbl_trainer","status!='R'"))
    {
        // var_dump($students);
        ?>

      <!DOCTYPE html>
        <html>
        <head>

          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

        #pkg {
          font-family:"Raleway" ;
          border-collapse: collapse;
          width: 80%;
          text-align:center;

        }

        #pkg td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
          text-align:center;
          font-size: 16px;


        }

        #pkg tr:nth-child(even){background-color: #f2f2f2;text-align:center;}

        #pkg tr:hover {background-color: #ddd;text-align:center;}

        #pkg  th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align:center;
          background-color: #154275;
          color: white;
font-size: 16px;
        }
        </style>
        </head>
        <body>

<center>
  <h2>Trainers</h2>


</center>
        <table id="pkg" align="center">
                <tr>

                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                  <th>Phone Number</th>



                </tr>
                <?php
                foreach($cats as $cat)
                {
                    ?>

                    <tr>
                        <td><?php echo $cat["t_fname"]; ?></td>
                        <td><?php echo $cat["t_lname"]; ?></td>
                        <td><?php echo $cat["email"]; ?></td>
                        <td><?php echo $cat["t_phone"]; ?></td>


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
        echo "<h3>No categoriid found :: </h3>";
    }


?>
">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
