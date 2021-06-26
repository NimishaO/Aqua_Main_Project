<?php
//error_reporting(0);
	require_once("classes/DataAccess.class.php");
	$dao = new DataAccess();
	$student=array("st_name"=>"manu","st_admno"=>"sr134","st_batch"=>2014,"st_gen"=>"male");
	if($dao->insert($student,"students"))
	{
		$msg="Success";
	}
	else
	{
		
		$msg="Failed ".$dao->getErrors();
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