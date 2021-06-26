<?php

require_once("header.php");
require_once("OOP/classes/DataAccess.class.php");
$trid=$_SESSION["trainer_id"];

$dao=new DataAccess();
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");

require_once("OOP/classes/FormValidator.class.php");
$fields=array("from"=>"","to"=>"","days"=>"","reason"=>"");
$rules=array("from"=>array("required"=>""),
			"to"=>array("required"=>""),
			"reason"=>array("required"=>""),
			"days"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);

if(isset($_POST["reg"]))
  {
		//var_dump($_POST);
      if($validator->validate($_POST))
        {
              $data=array("leave_tr_id"=>$_SESSION["trainer_id"],"leave_from"=>$_POST["from"],"leave_to"=>$_POST["to"],"leave_reason"=>$_POST["reason"],"leave_days"=>$_POST["days"],"leave_status"=>"p");
              if($dao->insert($data,"tbl_leave"))
                {
              	 $msg="Success";
                }
              else
                {
                  $msg="failed,please try again";
                }
         }

      else
         {
						//var_dump($_POST);
         }
  }
 

?>
<div class="main_bg" style="min-height: 500px; width: 70%; margin:0 auto;">
<div class="wrap">
<div class="main">
	<center>
		<h2>Leave Application</h2>
		<form method="post" name="reg" >
		<table class="table table-hover">
			<tr>
				<td>From Date</td>

				<td><?php echo $form->textBox("from",array("placeholder"=>"From Date","class"=>"form-control"));?></td>
				<td><?php echo $validator->error("from");?> </td>

			</tr>
			<tr>
				<td>To Date</td>

				<td><?php echo $form->textBox("to",array("placeholder"=>"To Date","class"=>"form-control", ));?></td>
				<td><?php echo $validator->error("to");?> </td>

			</tr>
			<tr>
				<td>Number Of Days</td>
				<td><?php echo $form->textBox("days",array("placeholder"=>"No:of Days","class"=>"form-control" ));?></td>

				<td>	<?php echo $validator->error("days"); ?></td>
			</tr>
			<tr>
				<td>Reason</td>
				<td><?php echo $form->textBox("reason",array("placeholder"=>"Reason","class"=>"form-control" ));?></td>

				<td>	<?php echo $validator->error("reason"); ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				
				<td><input type="submit" name="reg" value="Apply" style="width:150px;" /></td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td colspan="2">&nbsp;
				<h1><?php echo isset($msg)?$msg:""; ?></h1>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>
	</center>


</div>
</div>
</div>
<?php require_once("footer.php"); ?>
