<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
$fields=array("name"=>"","email"=>"","gender"=>"","dist"=>"","tech"=>"","paswd"=>"","cpaswd"=>"","addr"=>"","photo"=>"");
$rules= array("name"=>array("required"=>"","minlength"=>3,"maxlength"=>20),
				"email"=>array("required"=>"","email"=>""),
				"dist"=>array("required"=>"","dbexist"=>array("table"=>"district","field"=>"d_id")),
				"gender"=>array("required"=>"","exist"=>array("m","f")),
				"tech"=>array("required"=>""),
				"paswd"=>array("required"=>"","compare"=>array("compareto"=>"email","operator"=>"!=")),
				"cpaswd"=>array("required"=>"","compare"=>array("compareto"=>"paswd","operator"=>"=")),
				"addr"=>array("required"=>"")
				);
$labels=array("dist"=>"District","tech"=>"Technologies","paswd"=>"Password","addr"=>"Address","cpaswd"=>"Confirm Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{
		//process form

	}
}
?>
<html>
	<head>
		
	</head>
	<body>
		<h3>Registration</h3>
		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name</td>
				<td><?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?></td>
				<td><?php echo $validator->error("name"); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email")); ?></td>
				<td><?php echo $validator->error("email"); ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php
					$gender=array("Male"=>"m","Female"=>"f");
					echo $form->radioGroup("gender",array("class"=>"class1"),$gender);
				?></td>
				<td><?php echo $validator->error("gender"); ?></td>
			</tr>
			<tr>
				<td>District</td>
				<td><?php 
					//$dists=array("Trivandrum"=>1,"pathanamthitta"=>3,"Ernakulam"=>7,"Trichur"=>8);
				$dists=$dao->createOptions("d_name","d_id","district");
					echo $form->dropDownList("dist",array("class"=>"form-input"),$dists,"Select Dist");
				 ?></td>
				<td><?php echo $validator->error("dist"); ?></td>
			</tr>
			<tr>
				<td>Technologies</td>
				<td>
					<?php 
					$techs=array("PHP"=>"php","ASP.NET"=>"asp","JAVA"=>"java","ANDROID"=>"android");
				//$dists=$dao->createOptions("d_name","d_id","district","s_id=5");
					echo $form->checkBoxList("tech",array("class"=>"form-input"),$techs);
				 ?>
				</td>
				<td><?php echo $validator->error("tech"); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password")); ?></td>
				<td><?php echo $validator->error("paswd"); ?></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><?php echo $form->passwordBox("cpaswd",array("placeholder"=>"password")); ?></td>
				<td><?php echo $validator->error("cpaswd"); ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $form->textArea("addr",array("placeholder"=>"address")); ?></td>
				<td><?php echo $validator->error("addr"); ?></td>
			</tr>
			<tr>
				<td>Photo</td>
				<td><?php echo $form->fileField("photo",array()); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="reg" value="Register" /></td>
				<td>&nbsp;</td>			
			</tr>
		</table>
	</form>
	</body>

</html>