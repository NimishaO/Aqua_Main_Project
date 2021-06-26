<html>
	
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
			require_once("classes/AdvancedDataAccess.class.php");
			$adao = new AdvancedDataAccess();
			if($adao->delete("student","st_admno='sr124'"))
			{
				//var_dump(students);
				?>
					<h1>Deleted <?php echo $adao->getErrors();?></h1>

				<?php
			}
			else
			{
				echo "<h3>failed ".$adao->getErrors()."</h3>";
			}


		?>
	</body>
</html>