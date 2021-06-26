<?php
require_once("header.php");


?>
<?php

if(!isset($_GET["id"]))
{
 header("location:viewequipment.php");
}
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];


$rules=array("e_name"=>array("required"=>""),"e_price"=>array("required"=>""),"e_qnty"=>array("required"=>""),"e_status"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);

$dao=new DataAccess();


if(isset($_POST["reg"]))
{
  if ($validator->validate($_POST))
	{
    //var_dump($_FILES);
    if($_FILES["e_img"]["error"]==0)
        {
            require_once("OOP/classes/FileUpload.class.php");
            $upload= new FileUpload();
            $types=["image/jpg","image/png","image/jpeg"];
            if($file_name=$upload->doUploadCustom($_FILES["e_img"],$types,500,10,"../pics/subcatpics",$_POST["e_name"]))
            {
              $data=array("e_name"=>$_POST["e_name"],"e_price"=>$_POST["e_price"],"e_img"=>$file_name,"e_qnty"=>$_POST["e_qnty"]);
              if($dao->update($data,"tbl_equipment","e_id=$id"))
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
              $msg_file=$upload->error();
            }
        }
        else
        {
          $data=array("e_name"=>$_POST["e_name"],"e_price"=>$_POST["e_price"],"e_qnty"=>$_POST["e_qnty"],"e_status"=>$_POST["e_status"]);
          if($dao->update($data,"tbl_equipment","e_id=$id"))
          {
            $msg="Success";
          }
          else
          {
            $msg="Insertion failed";
          }
        }
    }
    else
    {
      var_dump($_SERVER);
    }
}
if(!$data = $dao->getData("*","tbl_equipment","e_id=$id"))
{
 header("location:viewequipment.php");
}
$details = $data[0];
$fields=array("e_name"=>$details["e_name"],"e_price"=>$details["e_price"],"e_img"=>"","e_qnty"=>$details["e_qnty"],"e_status"=>$details["e_status"]);
$form=new FormAssist($fields,$_POST);
  ?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
  <center>
		<h2>Update Equipment</h2>
		<form method="post" name="reg" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>Equipment Name</td>

				<td><?php echo $form->textBox("e_name",array("placeholder"=>"Equipment Name","class"=>"form-control", "name"=>"e_name"));?></td>
				<td><?php echo $validator->error("e_name");?> </td>

			</tr>
			<tr>
				<td>Price</td>

				<td><?php echo $form->textBox("e_price",array("placeholder"=>"Price","class"=>"form-control", "name"=>"e_price"));?></td>
				<td><?php echo $validator->error("e_price");?> </td>

			</tr>

			<tr>
				<td>Image</td>
        <td><input type="file" name="e_img" id="file" /></td>
				<?php echo isset($msg_file)?$msg_file:"";?>
      </tr>

      <td>Quantity</td>

      <td><?php echo $form->textBox("e_qnty",array("placeholder"=>"Price","class"=>"form-control", "name"=>"e_qnty"));?></td>
      <td><?php echo $validator->error("e_qnty");?> </td>

    </tr>
    <tr>
        <td>Status&nbsp;</td>
        <td>  <?php
          $status=["Active"=>"1","Blocked"=>"2","Removed"=>"3"];
          echo $form->dropDownList("e_status",array("class"=>"form-input"),$status,"Select");
          ?></td>
      </tr>

     </tr>

			<tr>
				<td>&nbsp;</td>
<h1><?php echo isset($msg)?$msg:""; ?></h1>
				<td><input type="submit" name="reg" value="Update" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</center>
	</form>

">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
