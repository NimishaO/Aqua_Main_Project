<?php
require_once("classes/FormAssist.class.php");

$fields=array("email"=>"","paswd"=>"");
$form=new FormAssist($fields,$_POST);

?>
<html>
	<head>

	</head>
	<body>
	<center><h1>Login</h1>
		<form method="post" enctype="multipart/form-data">
			<fieldset>
		<table>
			
			<tr>
				<td>Email</td>
				<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",)); ?></td>
				<td></td>
			</tr>
			

			<tr>
				<td>Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
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
