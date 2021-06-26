<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="<html>

	<head>
		<style>
		table,td,th
		{

		}
		table
		{
			border-collapse: collapse;
			margin: 0 auto;
			width:80%;
		}
		td,th
		{
			text-align: center;
			border-radius: 10px 10px 10px 10px;
			height:40px;
		}
		tr:nth-child(even)
		{
			background-color:#c3e4d4;
		}
		tr:nth-child(odd)
		{
			background-color: powderblue;
		}
		tr:nth-child(1)
		{
			background-color: gray;
		}
		</style>
	</head>
	<body>
		<?php
			require_once("classes/DataAccess.class.php");
      $dao=new DataAccess();
      $reg_id=$_SESSION["reg_id"];
      $data=$dao->getData("*","tbl_registration","reg_id='$reg_id'");
      $fields=array("fname"=>$data[0]["fname"],"lname"=>$data[0]["lname"],"address"=>$data[0]["address"],"phone"=>$data[0]["phone"],"gender"=>$data[0]["gender"]);
			if($students = $dao->getData($fields,"students"))
			{
				//var_dump(students);
				?>
        <table   align="center">
            <tr>
                <?php echo $details->textBox("fname",array("placeholder"=>"Enter your First Name", "name"=>"fname"));?>

            </tr>
            <tr>

                <?php echo $dedetails->textBox("lname",array("placeholder"=>"Enter your Last Name", "name"=>"lname"));?>

              </tr>


            <tr>

              <?php echo $details->radioGroup("gender",array(), array("Male"=>"m","Female"=>"f"));
                ?>
          </tr>

            <tr>

                <?php echo $form->textarea("address",array("placeholder"=>"Enter your Address","name"=>"address"));?>

            </tr>

          <tr>

                <?php echo $details->textBox("phone",array("placeholder"=>"Enter your Phone Number","type"=>"phone","name"=>"phone"));?>

            </tr>



             <tr>

                <input type="submit" value="Update" name="reg">
  </tr>
  </table>


				<?php
			}
			else
			{
				echo "<h3>No students found ".$dao->getErrors()."</h3>";
			}


		?>
	</body>
</html>">

</div>
</div>
</div>
<?php require_once("footer.php"); ?>
