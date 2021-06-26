<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="<?php

if(!isset($_GET["id"]))
{
 header("location:viewsb.php");
}
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];


$rules=array("item_name"=>array("required"=>""),"item_amt"=>array("required"=>""),"item_qty"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);

$dao=new DataAccess();


if(isset($_POST["reg"]))
{
  if ($validator->validate($_POST))
	{
    //var_dump($_FILES);
    if($_FILES["item_img"]["error"]==0)
        {
            require_once("OOP/classes/FileUpload.class.php");
            $upload= new FileUpload();
            $types=["image/jpg","image/png","image/jpeg"];
            if($file_name=$upload->doUploadCustom($_FILES["item_img"],$types,500,10,"../pics/subcatpics",$_POST["item_name"]))
            {
              $data=array("item_name"=>$_POST["item_name"],"item_amt"=>$_POST["item_amt"],"item_img"=>$file_name);
              if($dao->update($data,"tbl_sbitem","item_id=$id"))
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
              $msg_file=$upload->errors();
            }
        }
        else
        {
          $data=array("item_name"=>$_POST["item_name"],"item_amt"=>$_POST["item_amt"],"item_qty"=>$_POST["item_qty"],"status"=>$_POST["status"]);
          if($dao->update($data,"tbl_sbitem","item_id=$id"))
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
      // code...
    }
}
if(!$data = $dao->getData("*","tbl_sbitem","item_id=$id"))
{
 header("location:viewsb.php");
}
$details = $data[0];
$fields=array("item_name"=>$details["item_name"],"item_amt"=>$details["item_amt"],"item_qty"=>$details["item_qty"],"item_img"=>"","status"=>$details["status"]);
$form=new FormAssist($fields,$_POST);
  ?>


  <hr>
  <div class="main_bg" style="min-height: 500px;">
  <div class="wrap">
  <div class="main">
<center>
		<h2>Update Snack Bar Item</h2>
		<form method="post" name="reg" enctype="multipart/form-data" >
		<table align:"right">
			<tr>
				<td>Item Name</td>

				<td><?php echo $form->textBox("item_name",array("placeholder"=>"Item Name","class"=>"form-control", "name"=>"item_name"));?></td>
				<td><?php echo $validator->error("item_name");?> </td>

			</tr>
			<tr>
				<td>Price</td>

				<td><?php echo $form->textBox("item_amt",array("placeholder"=>"Price","class"=>"form-control", "name"=>"item_amt"));?></td>
				<td><?php echo $validator->error("item_amt");?> </td>

			</tr>
			<tr>
				<td>Image</td>
        <td><input type="file" name="item_img" id="file" /></td>
				<?php echo isset($msg_file)?$msg_file:"";?>
</tr>
        <tr>
          <td>Quantity</td>
          <td><?php echo $form->textBox("item_qty",array("placeholder"=>"Quantity","name"=>"item_qty"));?>
          <?php echo $validator->error("item_qty"); ?></td>
          <td></td>
        </tr>
        <tr>
  <td>&nbsp;</td>
        <td>  <?php
          $status=["Active"=>"A","Blocked"=>"B","Removed"=>"R"];
          echo $form->dropDownList("status",array("class"=>"form-input"),$status,"Select");
          ?></td>
      </tr>

     </tr>

			<tr>
				<td>&nbsp;</td>
<h1><?php echo isset($msg)?$msg:""; ?></h1>
				<td><input type="submit" name="reg" value="ADD" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</center>
	</form>
	</body>

</html>

">
</div>
</div>
</div>
<?php require_once("footer.php"); ?>
