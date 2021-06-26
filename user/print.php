<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php
    date_default_timezone_set("asia/calcutta");

$id=$_GET["id"];



require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

if($details = $dao->getData("*","tbl_userpkg","usr_pkg_id=$id"))
{
	?>
	<table class="table table-striped " style="width:60%; margin: 0 auto;">


		<tr>
			<th>Amount</th>
			<td><?php echo $details["0"]["usr_pkg_amt"] ?></td>
		</tr>
		<tr>
			<th>Transaction ID</th>
			<td><?php echo $details["0"]["usr_pkg_trans_no"] ?></td>
		</tr>
		<tr>
			<th>Card Number</th>
			<td><?php echo $details["0"]["usr_pkg_cardno"] ?></td>
		</tr>
		<tr>
			<th>Card user</th>
			<td><?php echo $details["0"]["usr_pkg_card_user"] ?></td>
		</tr>
		<tr>
			<th>Date Time</th>
			<td><?php echo date("d/m/Y h:i:s A",$details["0"]["usr_pkg_date"]); ?></td>
		</tr>
		<tr>
			<th></th>
			<td><button class="btn btn-primary" id="print">Print</button></td>
		</tr>
	</table>
	<?php

}

?>
</body>
<script type="text/javascript">
	document.getElementById("print").onclick=function(){
		window.print();
	};
</script>
</html>
