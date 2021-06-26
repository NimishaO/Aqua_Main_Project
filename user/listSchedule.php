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
          width:80%;
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
          text-align:center;

        }

        #pkg td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
          text-align:center;

        }

        #pkg tr:nth-child(even){background-color: #f2f2f2;text-align:center;}

        #pkg tr:hover {background-color: #ddd;text-align:center;}

        #pkg  th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color:  #154275;
          color: white;
          text-align:center;

        }
        </style>
        </head>


          <center>
            <h2> Schedule</h2>
          <table id="pkg" align="center">



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
