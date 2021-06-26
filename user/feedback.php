
<?php
require_once("header.php");

//var_dump($_SESSION);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("subject"=>"","content"=>"",);
$rules=array("subject"=>array("required"=>""),
			"content"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["send"]))
{
		//var_dump($_POST);
    if($validator->validate($_POST))
    {
        $reg_id=$_SESSION["reg_id"];
        $data=array("fb_reg_id"=>$reg_id,"fb_subject"=>$_POST["subject"],"fb_content"=>$_POST["content"],"fb_time"=>time(),"fb_status"=>'a');
        if($dao->insert($data,"tbl_feedback"))
        {
            $msg="Success";
        }
        else
    	{
            $msg="Insertion failed";
        }



    }
    else
    {
		//var_dump($_POST);

        //die("dfsdfsd");
    }
}



?>
<div class="main_bg" style="min-height: 500px;margin:0 auto;">
<div class="wrap">
<div class="main" >
	<center>
	 <form method="post" name="subcategory"  style="width:35%">
		       <h4 style="font-family:Raleway">Give Us Your Feedback</h4>
			<hr>		 
		<div class="form-group mb-6">
			   <label class="label" for="name">Subject</label>
			   <?php echo $form->textBox("subject",array("placeholder"=>"Subject","class"=>"form-control"));?>
			   <?php echo $validator->error("subject");
			    ?>

			</div>


			<div class="form-group mb-6">
			   <label class="label" for="name">Content</label>
			   <?php echo $form->textArea("content",array("placeholder"=>"Content","class"=>"form-control"));?>
			   <?php echo $validator->error("content"); ?>
			 </div>

			 <div class="form-group mb-6">
			   <label class="label" for="name"></label>
			   <input type="submit" name="send" value="Send" class="btn btn-success"/>

			 </div>


			<div class="form-group mb-6">
				<h5><?php echo isset($msg)?$msg:""; ?></h5>
			</div>
		</form>
		</center>

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
