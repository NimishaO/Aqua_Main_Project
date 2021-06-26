<?php
require_once("classes/FormAssist.class.php");
//require_once("classes/DataAccess.class.php");
$fields=array("name"=>"","email"=>"","gender"=>"","dist"=>"","tech"=>"","paswd"=>"","addr"=>"","photo"=>"");
$form=new FormAssist($fields,$_POST);
//$dao=new DataAccess();
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
				<td></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",)); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php
					$gender=array("Male"=>"m","Female"=>"f");
					echo $form->radioGroup("gender",array("class"=>"class1"),$gender);
				?></td>
				<td></td>
			</tr>
			
			<tr>
				<td>Technologies</td>
				<td>
					<?php 
					$techs=array("PHP"=>"php","ASP.NET"=>"asp","JAVA"=>"java","ANDROID"=>"android");
				//$dists=$dao->createOptions("d_name","d_id","district","s_id=5");
					echo $form->checkBoxList("tech",array("class"=>"form-input"),$techs,false);
				 ?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $form->textArea("addr",array("placeholder"=>"address")); ?></td>
				<td></td>
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