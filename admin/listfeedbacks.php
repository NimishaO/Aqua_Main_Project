<?php


require_once("header.php"); 
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
	<center>
<?php
	
	if($fbs = $dao->getData("*","tbl_feedback","1 order by fb_id desc"))
	{
		// var_dump($students);
		?>
			<table id="pkg" align="right">
				<tr>
					
					<th style="width: 30%;"> Subject</th>
                    <th>  Content</th>
                    <th>  Date</th>
            
					
				</tr>
				<?php
				foreach($fbs as $fb)
				{
					?>
					
					<tr>								
						<td><?php echo $fb["fb_subject"]; ?></td>
						<td><?php echo $fb["fb_content"]; ?></td>
						<td><?php echo date("d/m/Y h:i:s a",$fb["fb_time"]); ?></td>
						
					</tr>
					

					<?php
				}

				?>

			</table>
			<hr>


		<?php
	}
	else
	{
		echo "<h3>No categoriid found :: </h3>";
	}


?>






</center>

</div>
</div>
</div>
<?php require_once("footer.php"); ?>