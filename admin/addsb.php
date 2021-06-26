<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="  <!DOCTYPE html>
  <html>

  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
  .dropbtn  {
    background-color: #090b12;
    color: white;
    padding:10px 24px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    display:block;
    width:100%;
  }

  .dropdown {
    position: relative;
    display: block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: ;
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 12px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {background-color: #ddd;}

  .dropdown:hover .dropdown-content {display: block;}

  .dropdown:hover .dropbtn {background-color: #080505;}

  </style><?php
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("item_name"=>"","item_img"=>"","item_amt"=>"","item_qty"=>"");
$rules=array("item_name"=>array("required"=>""),"item_amt"=>array("required"=>""),"item_qty"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
    {
		//var_dump($_POST);
        if($validator->validate($_POST))
        {
            if(isset($_FILES["item_img"]))
              {
                require_once("OOP/classes/FileUpload.class.php");
                $upload= new FileUpload();
                $types=["image/jpg","image/png","image/jpeg"];
                if($file_name=$upload->doUploadCustom($_FILES["item_img"],$types,500,10,"../pics/subcatpics",$_POST["item_name"]))
                    {
                      $data=array("item_name"=>$_POST["item_name"],"item_img"=>$file_name,"item_amt"=>$_POST["item_amt"],"item_qty"=>$_POST["item_qty"]);
                      if($dao->insert($data,"tbl_sbitem"))
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
        }
        else
          {
			var_dump($_POST);

            //die("dfsdfsd");
           }
 }
  ?>
  <center>
    <h2>Add Snack Bar Item</h2>
<form method="post" name="subcategory" enctype="multipart/form-data" style="width:200px">

  <div class="form-group mb-3">
       <label class="label" for="name"> Item Name</label>
       <?php echo $form->textBox("item_name",array("placeholder"=>"Item Name","class"=>"form-control", "name"=>"item_name"));?>
       <?php echo $validator->error("item_name");
        ?>

    </div>





    <div class="form-group mb-3">
       <label class="label" for="name">Price</label>
       <?php echo $form->textBox("item_amt",array("placeholder"=>"Price","class"=>"form-control", "name"=>"item_amt"));?>
       <?php echo $validator->error("item_amt"); ?>
       </div>


       <div class="form-group mb-3">
          <label class="label" for="name">Quantity</label>
          <?php echo $form->textBox("item_qty",array("placeholder"=>"Quantity","class"=>"form-control", "name"=>"item_qty"));?>
          <?php echo $validator->error("item_qty"); ?>
          </div>

    <div class="form-group mb-3">
    <label class="label" for="name">Image</label>
    <input type="file" name="item_img" id="file"  />
    <div id="submit" class="row">
    <?php echo isset($msg_file)?$msg_file:"";

    ?>
    </div>

<h1><?php echo isset($msg)?$msg:""; ?></h1>
<input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
</form>
</center>


">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
