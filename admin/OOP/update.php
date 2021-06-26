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
			require_once("classes/DataAccess.class.php");
			$dao = new DataAccess();
			$data=array("st_name"=>"vinu","st_batch"=>2015);
			if($dao->update($data,"students","st_admno='sr113'"))
			{
				//var_dump(students);
				?>
					<h1>Updated</h1>

				<?php
			}
			else
			{
				echo "<h3>No students updated ".$dao->getErrors()."</h3>";
			}


		?>
	</body>
</html>