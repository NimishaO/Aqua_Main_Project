<?php
//error_reporting(0);
	require_once("classes/DataAccess.class.php");
	$dao = new DataAccess();
	$student=array(null,"manu","sr12321","cse","male",2014);
	if($dao->insertFull($student,"students"))
	{
		$msg="Success";
	}
	else
	{
		$msg=$dao->getErrors();
	}
	echo $dao->lastQuery();
?>
<html>
	<head>
		
	</head>
	<BODY>
	<H3><?php echo $msg; ?></H3>	



	</BODY>

</html>