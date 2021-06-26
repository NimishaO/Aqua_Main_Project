<?php
require_once("header.php");

require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();
$reg_id=$_SESSION["reg_id"];
$data=$dao->getData("*","tbl_registration","reg_id='$reg_id'");
$fields=array("fname"=>$data[0]["fname"],"lname"=>$data[0]["lname"],"address"=>$data[0]["address"],"phone"=>$data[0]["phone"],"gender"=>$data[0]["gender"]);
$rules= array("fname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
                "lname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
                "phone"=>array("required"=>"","regexp"=>'/^[6-9][0-9]{9}$/'),
                "address"=>array("required"=>""),
                "gender"=>array("required"=>"","exist"=>array("m","f"))
				);
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{

        $data = array("fname"=>$_POST["fname"],"lname"=>$_POST["lname"],"gender"=>$_POST["gender"],"phone"=>$_POST["phone"],"address"=>$_POST["address"]);

        if($dao->update($data,"tbl_registration","reg_id='$reg_id'"))
        {

              $msg="Success";

        }
        else
        {
            //var_dump($dao->getErrors());
              $msg="Failed ,please try again";
        }


    }
    else
    {
        $error=true;
    }
}
?>


<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
	<div class="container">
        <div class="row">
        	<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="sign-in-form-area">
                    <h3 class="title"> Edit Profile</h3>
                    <table   align="center">
                        <tr>
                            <?php echo $form->textBox("fname",array("placeholder"=>"Enter your First Name", "name"=>"fname"));?>
                						<?php echo $validator->error("fname"); ?>
                        </tr>
                        <tr>

                            <?php echo $form->textBox("lname",array("placeholder"=>"Enter your Last Name", "name"=>"lname"));?>
                						<?php echo $validator->error("lname"); ?>
                          </tr>


                        <tr>

                          <?php echo $form->radioGroup("gender",array(), array("Male"=>"m","Female"=>"f"));
                            ?>
                      </tr>

                        <tr>

                            <?php echo $form->textarea("address",array("placeholder"=>"Enter your Address","name"=>"address"));?>
                        				<?php echo $validator->error("address"); ?>
                        </tr>

                      <tr>

                            <?php echo $form->textBox("phone",array("placeholder"=>"Enter your Phone Number","type"=>"phone","name"=>"phone"));?>
                            <?php echo $validator->error("phone"); ?>
                        </tr>



                         <tr>

                            <input type="submit" value="Update" name="reg">
</tr>
</table>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
</div>
  <?php require_once("footer.php"); ?>
