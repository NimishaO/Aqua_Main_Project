<?php
require_once("classes/FormAssist.class.php");

$fields=array("name"=>"","email"=>"","gender"=>"","paswd"=>"","addr"=>"","allergy"=>"","photo"=>"");
$form=new FormAssist($fields,$_POST);

?>
<html>
	<head>

	</head>
	<body>
	<center><h1>Registration</h1>
		<form method="post" enctype="multipart/form-data">
			<fieldset>
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
				<td>Allergy</td>
				<td><?php echo $form->textBox("allergy",array("placeholder"=>"if any")); ?></td>
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
	</fieldset>
	</form>
	</body>

</html>
