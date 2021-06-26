<?php
require_once("header.php");
if(!isset($_GET["id"]))
{
 header("location:viewpkg.php"); 
}
require_once("payment.php");
$uid= $_SESSION["reg_id"];
$id=$_GET["id"];
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("cardno"=>"","cvv"=>"","expiry"=>"","name"=>"","amount"=>"");
$rules=array("cardno"=>array("required"=>""),
            "cvv"=>array("required"=>""),
            "name"=>array("required"=>""),
            "expiry"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$dao=new DataAccess();
$details = $dao->getData("*","tbl_package","pkg_id=$id");
//var_dump($details);
$fields["amount"]=$details[0]["pkg_amt"];
$form=new FormAssist($fields,$_POST);


if(isset($_POST["pid"]))
{

        $pid=$_POST["pid"];
        if($validator->validate($_POST))
        {

            $pay_details = pay($_POST["cardno"],$_POST["cvv"],$_POST["expiry"],$details[0]["pkg_amt"]);
            if($pay_details["status"])
            {
                $data = ["usr_pkg_user_id"=>$uid,"usr_pkg_pkg_id"=>$pid,"usr_pkg_status"=>'a',"usr_pkg_cardno"=>$_POST["cardno"],"usr_pkg_trans_no"=>$pay_details["trans_no"],"usr_pkg_card_user"=>$_POST["name"],"usr_pkg_date"=>time(),"usr_pkg_amt"=>$details[0]["pkg_amt"]];
                if($dao->insert($data,"tbl_userpkg"))
                {
                $msg="Package Registered";
                $print=$dao->max("usr_pkg_id","tbl_userpkg");
                }
                else
                {
                    $msg="Error, pls Try again";

                    //var_dump($dao->getErrors());

                }
            }
            else
            {
                $msg=$pay_details["message"];
            }
        }


}




?>

<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
        <div class="main" style="margin-left: 100px;">
            <table class="table" align="center" style="width: 80%; margin: 0 auto;">
                <tr>
                    <td><h4>Package : <?= $details[0]["pkg_name"] ?></h4></td>
                </tr>


                <tr>
                    <td>
                        <center>
                        <form method="post">
                        <input type="hidden" name="pid" value="<?= $id ?>">
                        <div class="col-4"></div>
                        <div class="col-8">
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for="">Name</label>
                               <?php echo $form->textBox("name",array("placeholder"=>"Name on Card","class"=>"form-control"));?>
                               <?php echo $validator->error("name");
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for="">Card No</label>
                               <?php echo $form->textBox("cardno",array("placeholder"=>"Card Number","class"=>"form-control"));?>
                               <?php echo $validator->error("cardno");
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for="">CVV</label>
                               <?php echo $form->textBox("cvv",array("placeholder"=>"3 dgit CVV","class"=>"form-control"));?>
                               <?php echo $validator->error("cvv");
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for="">Expiry</label>
                               <?php echo $form->textBox("expiry",array("placeholder"=>"mm/yy","class"=>"form-control"));?>
                               <?php echo $validator->error("expiry");
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for="">Amount</label>
                               <?php echo $form->textBox("amount",array("readonly"=>"readonly","class"=>"form-control"));?>



                            </div>



                        </div>
                        <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for=""></label>
                               <input class="btn btn-success" style="width:150px;" type="submit" name="reg" value="Subscribe" />



                            </div>



                        </div>
                        </div>
                         <div class="row">
                            <div class="form-group mb-12">
                               <label class="label" for=""></label>
                               <h6><?php echo isset($msg)?$msg:"";?>
                               <?php
                                if(isset($print))
                                {
                                    ?>
                                    <a target ="_blank" class="btn btn-success" href="print.php?id=<?= $print ?>">Print</a>
                                    <?php
                                }

                                ?></h6>


                            </div>



                        </div>
                        </div>
                        </form>


                        </center>
                    </td>
                    </tr>
                </table>
        </div>

</div>
</div>
</div>

<?php require_once("footer.php"); ?>
