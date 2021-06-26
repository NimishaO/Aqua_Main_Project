<?php
//error_reporting(0);
	require_once("classes/AdvancedDataAccess.class.php");
	$adao = new AdvancedDataAccess();
	$student=array(null,"manu","sr123","cse","male",2014);
	if($adao->insertFull($student,"students"))
	{
		$msg="Success";
	}
	else
	{
		$msg="Failed";
	}
?>
<html>
	<head>
		
	</head>
	<BODY>
	<H3><?php echo $msg; ?></H3>	



	</BODY>

</html>