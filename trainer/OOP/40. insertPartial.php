<?php
//error_reporting(0);
	if(isset($_POST['sub']))						
	{
		$name=$_POST['fname'];
		$admission=$_POST['adm'];
		$dept=$_POST['dept'];
		$gender=$_POST['gender'];
		$year=$_POST['year'];			
	
		require_once("classes/DataAccess.class.php");
		$dao = new DataAccess();
		$student=array("name"=>$name,"admno"=>$admission,"department"=>$dept,"gender"=>$gender,"year"=>$year);
		if($dao->insert($student,"students"))
		{
			$msg="Inserted Successfully";
		}
		else
		{
			$msg="Insertion failed";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Partial Insertion</title>
</head>

<body>
	<form method="post" enctype="multipart/form-data">
    		<table border="2" align="center">
            <tr>
            	<th colspan="2">REGISTRATION FORM</th>
            </tr>
            	<tr>
                	<td>Name</td>
                    <td><input type="text" name="fname" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>" /></td>
                </tr>
                <tr>
                	<td>Admission No.</td>
                    <td><input type="text" name="adm" value="<?php if(isset($_POST['adm'])){echo $_POST['adm'];}?>" /></td>
                </tr>
                <tr>
                	<td>Department</td>
                    <td><select name="dept">
                    	<option value="" selected="selected" disabled="disabled">-------- Department --------</option>
                    	<option value="EL">EL</option>
                        <option value="CS">CS</option>
                        <option value="CHM">CHM</option>
                    	</select>
                    </td>
                </tr>
                <tr>
                	<td>Gender</td>
                   	<td><input type="radio" name="gender" value="Male" >Male</input>
                    	<input type="radio" name="gender" value="Female">Female</input></td>
                </tr>
                <tr>
                	<td>Year</td>
                    <td><input type="number" name="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];}?>"></td>
                </tr>
                <tr>
                	<th colspan="2" align="center"><input type="submit" name="sub" value="Register" /></th>
                </tr>
                <tr>
                	<th colspan="2" align="center"><?php if(isset($msg)){echo $msg;}?></th>
                </tr>
       		</table>
        </form>
    </body>
</html>