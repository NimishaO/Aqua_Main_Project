<?php
require_once("header.php");

 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");


$rules=array("from"=>array("required"=>""),
			"to"=>array("required"=>""),
			"days"=>array("required"=>""),"duty"=>array(),"shift"=>array());
$labels=array();
$validator=new FormValidator($rules,$labels);

$dao=new DataAccess();
if(isset($_POST["reg"]))
  {
		//var_dump($_POST);
      if($validator->validate($_POST))
        {
              $data=array("sch_from"=>$_POST["from"],"sch_to"=>$_POST["to"],"duty"=>$_POST["duty"],"shift"=>$_POST["shift"],"sch_days"=>implode(",",$_POST["days"]));
              if($dao->update($data,"tbl_schedule","sch_tr_id"))
                {
              	 $msg="Success";
                }
              else
                {
                  $msg="Insertion failed,please try again";
                }
         }

      else
         {
						//var_dump($_POST);
         }
  }

$details=$dao->getData("*","tbl_schedule","sch_tr_id");
$fields=array("from"=>$details[0]["sch_from"],"to"=>$details[0]["sch_to"],"duty"=>$details[0]["duty"],"shift"=>$details[0]["shift"],"days"=>explode(",",$details[0]["sch_days"]));
$form=new FormAssist($fields,$_POST);
?>
<div class="main_bg" style="min-height: 500px; width: 70%; margin:0 auto;">
<div class="wrap">
<div class="main">
	<center>
		<h2>My Schedule</h2>
		<form method="post" name="reg" >
		<table class="table table-hover">
			<td>Shift</td>
			<td>
				<?php echo $form->textBox("shift",array("placeholder"=>"Shift","name"=>"shift"));?>
				<?php echo $validator->error("shift"); ?>
						</td>
					</tr>
					<td>Duty</td>
					<td>

				<?php echo $form->textBox("duty",array("placeholder"=>"Duty","name"=>"duty"));?>
			<?php echo $validator->error("duty"); ?>
					</td>
				</tr>
			<tr>
				<td>From Time</td>

				<td><?php echo $form->textBox("from",array("placeholder"=>"From Time","class"=>"form-control"));?></td>
				<td><?php echo $validator->error("from");?> </td>

			</tr>
			<tr>
				<td>To Time</td>

				<td><?php echo $form->textBox("to",array("placeholder"=>"To Time","class"=>"form-control", ));?></td>
				<td><?php echo $validator->error("to");?> </td>

			</tr>
			<tr>
				<td>Days</td>
				<td><?php
					$days=["monday"=>"monday","tuesday"=>"tuesday","wednesday"=>"wednesday","thursday"=>"thursday","friday"=>"friday","saturday"=>"saturday","sunday"=>"sunday"];
					echo $form->checkBoxList("days",array("style"=>"height:10px;margin:5px;"),$days,false);?>
				<?php echo $validator->error("days"); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>&nbsp;</td>

				<td><input type="submit" name="reg" value="Update" style="width:150px;" /></td>
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
