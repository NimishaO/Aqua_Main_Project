<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main"></div><?php
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("pkg_name"=>"","pkg_amt"=>"","pkg_descpt"=>"","pkg_cap"=>"","pkg_durtn"=>"","pkg_age"=>"","pkg_trainer"=>"");
$rules=array("pkg_name"=>array("required"=>""),"pkg_amt"=>array("required"=>""),"pkg_descpt"=>array("required"=>""),"pkg_cap"=>array("required"=>""),"pkg_durtn"=>array("required"=>""),"pkg_age"=>array("required"=>""),"pkg_trainer"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME","pkg_trainer"=>"Trainer");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
  {
		//var_dump($_POST);
      if($validator->validate($_POST))
        {
              $data=array("pkg_name"=>$_POST["pkg_name"],"pkg_amt"=>$_POST["pkg_amt"],"pkg_descpt"=>$_POST["pkg_descpt"],"pkg_cap"=>$_POST["pkg_cap"],"pkg_durtn"=>$_POST["pkg_durtn"],"pkg_age"=>$_POST["pkg_age"],"pkg_trainer"=>$_POST["pkg_trainer"]);
              if($dao->insert($data,"tbl_package"))
                {
              	 $msg="Success";
                }
              else
                {
                  $msg="Insertion failed,please try again";
                }
         }

      else
         {
						//var_dump($_POST);
         }
  }
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
		<h2>Add Package</h2>
		<form method="post" name="reg" >
		<table>
			<tr>
				<td>Package Name</td>

				<td><?php echo $form->textBox("pkg_name",array("placeholder"=>"Package Name","class"=>"form-control", "name"=>"pkg_name"));?></td>
				<td><?php echo $validator->error("pkg_name");?> </td>

			</tr>
			<tr>
				<td>Price</td>

				<td><?php echo $form->textBox("pkg_amt",array("placeholder"=>"Price","class"=>"form-control", "name"=>"pkg_amt"));?></td>
				<td><?php echo $validator->error("pkg_amt");?> </td>

			</tr>
			<tr>
				<td>Capacity</td>
				<td><?php echo $form->textBox("pkg_cap",array("placeholder"=>"Capacity","name"=>"pkg_cap"));?>
				<?php echo $validator->error("pkg_cap"); ?></td>
				<td></td>
			</tr>

      <tr>
        <td>Duration</td>
        <td><?php echo $form->textBox("pkg_durtn",array("placeholder"=>"Duration","name"=>"pkg_durtn"));?>
        <?php echo $validator->error("pkg_durtn"); ?></td>
        <td></td>
      </tr>

      <tr>
				<td>Age</td>
				<td><?php echo $form->textBox("pkg_age",array("placeholder"=>"Age","name"=>"pkg_age"));?>
				<?php echo $validator->error("pkg_age"); ?></td>
				<td></td>
			</tr>
      <tr>
				<td>Description</td>
				<td><?php echo $form->textBox("pkg_descpt",array("placeholder"=>"Description","name"=>"pkg_descpt"));?>
				<?php echo $validator->error("pkg_descpt"); ?></td>
				<td></td>
			</tr>
      <tr>
        <td>Trainer</td>
        <td>
          <?php
          $cats=$dao->createOptions("t_fname","t_id","tbl_trainer");
          echo $form->dropDownList("pkg_trainer",array("class"=>"form-input"),$cats,"Select Trainer");
          ?>
        </td>
        <?php echo $validator->error("pkg_trainer"); ?></td>
        <td></td>
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
