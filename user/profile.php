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
                    <form class="sign-in-form" method="post" enctype="multipart/form-data" name= "reg">
                        <div class="form-group">

                                First Name : <?= $data[0]["fname"] ?>  

                          </div>
                        <div class="form-group">

                            Last Name : <?= $data[0]["lname"] ?>

                        </div>


                        <div class="form-group">

                           Gender : <?= $data[0]["gender"] ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textarea("address",array("placeholder"=>"Enter your Address","name"=>"address"));?>
                        				<?php echo $validator->error("address"); ?>
                        </div>

                        <div class="form-group">

                            <?php echo $form->textBox("phone",array("placeholder"=>"Enter your Phone Number","type"=>"phone","name"=>"phone"));?>
                            <?php echo $validator->error("phone"); ?>
                        </div>



                         <div class="form-group">

                            <input type="submit" value="Update" name="reg">

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
