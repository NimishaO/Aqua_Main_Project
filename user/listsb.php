<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="<?php
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<?php

    if($cats = $dao->getData("*","tbl_sbitem","status!='R'"))
    {
        // var_dump($students);
        ?>

        <!DOCTYPE html>
        <html>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        .btn
        {
        float:right;
        background-color: #98B7F4; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        width:10%;
        }
        .btn:hover {
          background-color: #2A4374;
          color: white;
        }
        #pkg {
          font-family: ;
          border-collapse: collapse;
          width: 80%;
          text-align:center;

        }

        #pkg td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
          text-align:center;

        }

        #pkg tr:nth-child(even){background-color: #f2f2f2; text-align:center;}

        #pkg tr:hover {background-color: #ddd;text-align:center;}

        #pkg  th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color: #154275;
          color: white;

        }
        </style>
        </head>

        <center>
        <button class="btn btn-success" id="print">Print</button>
        <script>
        document.getElementById("print").onclick=function(){
            window.print();
        };
        </script>
        </center>

          <center>

            <table id="pkg" align="center">
            <tr>


              <center>  <th>MENU</th></center>


            </tr>
          </table>
          <table id="pkg" align="center">

                <tr>

                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Qty</th>

                </tr>
                <?php
                foreach($cats as $cat)
                {
                    ?>

                    <tr>
                        <td><?php echo $cat["item_name"]; ?></td>
                        <td>₹<?php echo $cat["item_amt"]; ?></td>
                        <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["item_img"]; ?>" /> <br> <?php echo $cat["item_img"]; ?> </td>
                        <td><?php echo $cat["item_qty"]; ?></td>

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
