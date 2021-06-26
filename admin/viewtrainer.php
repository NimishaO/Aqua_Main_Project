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

    if($cats = $dao->getData("*","tbl_trainer","status!='R'"))
    {
        // var_dump($students);
        ?>

        <!DOCTYPE html>
        <html>
        <head>
          <title>Admin Dashboard</title>
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
        }

.btn:hover {
  background-color: #2A4374;
  color: white;
}
        .dropbtn  {
          background-color: #090b12;
          color: white;
          padding:10px 24px;
          font-size: 16px;
          cursor: pointer;
          border: none;
          display:block;
          width:100%;
        }

        .dropdown {
          position: relative;
          display: block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: ;
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 12px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #080505;}

        #pkg {
          font-family: ;
          border-collapse: collapse;
          width: 80%;

        }

        #pkg td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;

        }

        #pkg tr:nth-child(even){background-color: #f2f2f2;}

        #pkg tr:hover {background-color: #ddd;}

        #pkg  th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: black;
          color: white;

        }
        </style>
        </head>
        <body>


          <hr>
          <center>




        <button class="btn btn-success" id="print">Print</button>
        <script>
        document.getElementById("print").onclick=function(){
            window.print();
        };
        </script>
        <hr>
<center>
  <h2>View Trainer</h2>


</center>
        <table id="pkg" align="right">
                <tr>

                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone Number</th>


                    <th>update</th>

                </tr>
                <?php
                foreach($cats as $cat)
                {
                    ?>

                    <tr>
                        <td><?php echo $cat["t_fname"]; ?></td>
                        <td><?php echo $cat["t_lname"]; ?></td>
                        <td><?php echo $cat["email"]; ?></td>
                        <td><?php echo $cat["t_gender"]; ?></td>
                        <td><?php echo $cat["t_address"]; ?></td>
                        <td><?php echo $cat["t_phone"]; ?></td>
                        
                        <td><a class="btn btn-warning" href="updatetrainer.php?id=<?php echo $cat["t_id"]; ?>">Update</a></td>
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