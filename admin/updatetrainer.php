<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main"><?php

if(!isset($_GET["id"]))
{
 header("location:viewtrainer.php");
}
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];


$rules=array("t_fname"=>array("required"=>""),"t_lname"=>array("required"=>""),"email"=>array("required"=>""),"t_gender"=>array("required"=>""),"t_address"=>array("required"=>""),
"t_phone"=>array("required"=>""),"t_duty"=>array(),"t_shift"=>array(),"password"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);

$dao=new DataAccess();


if(isset($_POST["reg"]))
{
  if ($validator->validate($_POST))
	{
    //var_dump($_POST);
    $data=array("t_fname"=>$_POST["t_fname"],"t_lname"=>$_POST["t_lname"],"email"=>$_POST["email"],"t_gender"=>$_POST["t_gender"],
    "t_address"=>$_POST["t_address"],"t_phone"=>$_POST["t_phone"],"t_duty"=>$_POST["t_duty"],"t_shift"=>$_POST["t_shift"],"password"=>$_POST["password"],"status"=>$_POST["status"]);
    if($dao->update($data,"tbl_trainer","t_id=$id"))
    {
      $msg="Success";
    }
    else
    {
      $msg="Insertion failed";
    }
  }
}
if(!$data = $dao->getData("*","tbl_trainer","t_id=$id"))
{
 header("location:viewtrainer.php");
}
$details = $data[0];

$fields=array("t_fname"=>$details["t_fname"],"t_lname"=>$details["t_lname"],"email"=>$details["email"],"t_gender"=>$details["t_gender"],
"t_address"=>$details["t_address"],"t_phone"=>$details["t_phone"],"t_duty"=>$details["t_duty"],"t_shift"=>$details["t_shift"],"password"=>$details["password"],"status"=>$details["status"]);

$form=new FormAssist($fields,$_POST);
  ?>
  <!DOCTYPE html>
  <html>
  <title>Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
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

  </style>
  

<hr>

<center>
		<h2>Update Trainer</h2>
		<form method="post" name="reg" >
		<table>

      <tr>

        <td>Name</td>

        <td><?php echo $form->textBox("t_fname",array("placeholder"=>"First Name","class"=>"form-control", "name"=>"t_fname"));?></td>
        <td><?php echo $validator->error("t_fname");?> </td>

        </tr>
        <tr>
        <td>Last Name</td>

        <td><?php echo $form->textBox("t_lname",array("placeholder"=>"Last Name","class"=>"form-control", "name"=>"t_lname"));?></td>
        <td><?php echo $validator->error("t_lname");?> </td>

        </tr>
        <tr>
        <td>Email</td>
        <td><?php echo $form->textBox("email",array("placeholder"=>"Enter Email","type"=>"email","name"=>"email"));?>
        <?php echo $validator->error("email"); ?></td>
        <td></td>
        </tr>
        <tr>
        <td>Gender</td>
        <td><?php echo $form->radioGroup("t_gender",array(), array("Male"=>"m","Female"=>"f"));
          ?>
        <?php echo $validator->error("t_gender"); ?></td>
        <td></td>
        </tr>

        <tr>
        <td>Address</td>
        <td>
          <?php echo $form->textarea("t_address",array("placeholder"=>"Enter Address","name"=>"t_address"));?>
              <?php echo $validator->error("t_address"); ?>
        </td>
        </tr>

        <tr>
        <td>Phone Number</td>
        <td>

        <?php echo $form->textBox("t_phone",array("placeholder"=>"Phone Number","type"=>"phone","name"=>"t_phone"));?>
        <?php echo $validator->error("t_phone"); ?>
        </td>
        </tr>

        <td>Shift</td>
        <td>
        <?php echo $form->textBox("t_shift",array("placeholder"=>"Shift","name"=>"t_shift"));?>
        <?php echo $validator->error("t_shift"); ?>
        </td>
        </tr>
        <td>Duty</td>
        <td>

        <?php echo $form->textBox("t_duty",array("placeholder"=>"Duty","name"=>"t_duty"));?>
        <?php echo $validator->error("t_duty"); ?>
        </td>
        </tr>

        <tr>
        <td>Password</td>
        <td><?php echo $form->passwordBox("password",array("placeholder"=>"Password","name"=>"password"));?>
        <?php echo $validator->error("password"); ?></td>
        <td></td>
        </tr>

        <tr>
  <td>&nbsp;</td>
        <td>  <?php
          $status=["Active"=>"A","Blocked"=>"B","Removed"=>"R"];
          echo $form->dropDownList("status",array("class"=>"form-input"),$status,"Select");
          ?></td>
      </tr>


        <tr>
        <td>&nbsp;</td>
        <h1><?php echo isset($msg)?$msg:""; ?></h1>
        <td><input type="submit" name="reg" value="ADD" /></td>
        <td>&nbsp;</td>
        </tr>
		</table>
	</center>
	</form>
	</body>

</html>
">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
