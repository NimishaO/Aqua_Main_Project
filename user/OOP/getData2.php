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
			if($students = $dao->getData("*","students"))
			{
				//var_dump(students);
				?>
					<table>
						<tr>
							<th>ID</th>
							<th>Admission Number</th>
							<th>Name</th>
							
							<th>Gender</th>
							<th>Department</th>							
							<th>Batch</th>
						</tr>
						<?php
						foreach($students as $student)
						{
							?>
							<tr>
								<td><?php echo $student["st_id"]; ?></td>
								<td><?php echo $student["st_admno"]; ?></td>
								<td><?php echo $student["st_name"]; ?></td>
								<td><?php echo $student["st_gen"]; ?></td>
								<td><?php echo $student["st_dept"]; ?></td>
								<td><?php echo $student["st_batch"]; ?></td>
							</tr>

							<?php
						}

						?>

					</table>


				<?php
			}
			else
			{
				echo "<h3>No students found ".$dao->getErrors()."</h3>";
			}


		?>
	</body>
</html>