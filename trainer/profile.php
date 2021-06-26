<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();
$tr_id=$_SESSION["trainer_id"];
$data=$dao->getData("*","tbl_trainer","t_id=$tr_id");
$fields=array("t_fname"=>$data[0]["t_fname"],"t_lname"=>$data[0]["t_lname"],"t_gender"=>$data[0]["t_gender"],"t_address"=>$data[0]["t_address"],"t_phone"=>$data[0]["t_phone"]);
$rules=array("t_fname"=>array("required"=>""),
			"t_lname"=>array("required"=>""),
			"t_gender"=>array("required"=>""),
			"t_address"=>array("required"=>""),
			"t_phone"=>array("required"=>""),
			);
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
	//var_dump($_FILES);
    if($validator->validate($_POST))
    {
    	require_once("OOP/classes/FileUpload.class.php");
        $upload= new FileUpload();
        $error  = false;
        $types=["image/jpg","image/png","image/jpeg"];

        if($_FILES["image"]["error"]==0)
        {
        	if($img=$upload->doUpload($_FILES["image"],$types,1000,10,"../pics/subcatpics"))
        	{
        		$data=array("t_fname"=>$_POST["t_fname"],"t_lname"=>$_POST["t_lname"],"t_gender"=>$_POST["t_gender"],"t_address"=>$_POST["t_address"],"t_phone"=>$_POST["t_phone"],"t_img"=>$img);
		        if($dao->update($data,"tbl_trainer","t_id=$tr_id"))
		        {
		        	$msg="Success";
		        }
		        else
		         {
		         	$msg="Failed,please try again";
		         }
        	}
        	else
        	{
        		$error=true;
	        	$msg_image=$upload->errors();
        	}
        }
        else
        {
        	$data=array("t_fname"=>$_POST["t_fname"],"t_lname"=>$_POST["t_lname"],"t_gender"=>$_POST["t_gender"],"t_address"=>$_POST["t_address"],"t_phone"=>$_POST["t_phone"]);
	        if($dao->update($data,"tbl_trainer","t_id=$tr_id"))
	        {
	        	$msg="Success";
	        }
	        else
	        {
	        	$msg="Failed,please try again";
	        }

        }




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
		<h2>Update Profile</h2>
		<form method="post" name="reg" enctype="multipart/form-data">
		<table>
			<tr>
				<td>First Name</td>

						<td> <?= $data[0]["t_fname"] ?></td>



			</tr>
			<tr>
				<td>Last Name</td>

				<td> <?= $data[0]["t_lname"] ?></td>

			</tr>

			<tr>
				<td>Gender</td>
				<td> <?= $data[0]["t_gender"] ?></td>
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


			<tr>
				<td>Image</td>
        		<td><input type="file" name="image" id="image" /></td>
				<?php echo isset($msg_image)?$msg_image:"";?>
     		</tr>


			<tr>
				<td>&nbsp;</td>

				<td><input type="submit" name="reg" value="update" /></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>

				<td><h1><?php echo isset($msg)?$msg:""; ?></h1></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</center>
	</form>
	</body>

</html>

<?php require_once("footer.php"); ?>
