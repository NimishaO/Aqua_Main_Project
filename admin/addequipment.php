<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("e_name"=>"","e_price"=>"","e_img"=>"","e_qnty"=>"");
$rules=array("e_name"=>array("required"=>""),"e_price"=>array("required"=>""),"e_qnty"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
    {
		//var_dump($_POST);
        if($validator->validate($_POST))
        {
            if(isset($_FILES["e_img"]))
              {
                require_once("OOP/classes/FileUpload.class.php");
                $upload= new FileUpload();
                $types=["image/jpg","image/png","image/jpeg"];
                if($file_name=$upload->doUploadCustom($_FILES["e_img"],$types,1000,10,"../pics/subcatpics",$_POST["e_name"]))
                    {
                      $data=array("e_name"=>$_POST["e_name"],"e_price"=>$_POST["e_price"],"e_img"=>$file_name,"e_qnty"=>$_POST["e_qnty"]);
                      if($dao->insert($data,"tbl_equipment"))
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
        
 }
  ?>

  <!DOCTYPE html>
  <html>
  <title>Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  </style>
  

  <hr>

      <center>
        <h2>Add Equipments</h2>
  <form method="post" name="subcategory" enctype="multipart/form-data" style="width:200px">

      <div class="form-group mb-3">
           <label class="label" for="name">Equipment Name</label>
           <?php echo $form->textBox("e_name",array("placeholder"=>"Equipment Name","class"=>"form-control", "name"=>"e_name"));?>
           <?php echo $validator->error("e_name");
            ?>

        </div>





        <div class="form-group mb-3">
           <label class="label" for="name">Price</label>
           <?php echo $form->textBox("e_price",array("placeholder"=>"Price","class"=>"form-control", "name"=>"e_price"));?>
           <?php echo $validator->error("e_price"); ?>
        </div>

        <div class="form-group mb-3">
           <label class="label" for="name">Quantity</label>
           <?php echo $form->textBox("e_qnty",array("placeholder"=>"Quantity","class"=>"form-control", "name"=>"e_qnty"));?>
           <?php echo $validator->error("e_qnty"); ?>
        </div>




        <div class="form-group mb-3">
        <label class="label" for="name">Image</label>
        <input type="file" name="e_img" id="file"  />
        <div id="submit" class="row">
        <?php echo isset($msg_file)?$msg_file:"";

        ?>
        </div>

  <h1><?php echo isset($msg)?$msg:""; ?></h1>
    <input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
    </form>
    </center>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4></h4>
    <p></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
