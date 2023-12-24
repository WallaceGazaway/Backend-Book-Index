<?php
session_start();
include ("includes/openDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 - Select</title>
</head>

<body>
	<?php
	//Prepare sql statement
	$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books ORDER BY BookID ASC";
	
	//execute sql query and store result of execute in $result
	// the $db was made in OpenDbConn.php
	$result = mysqli_query($db, $sql);
	
	//Check for records in the result, if not set to 0
	if( empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Project 1 - Select</h1>
	<?php
	include ("includes/menu.php");
	?>
	
	<table style="border: 0px; width: 700px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Books">
		<thead>
			<tr>
				<th colspan="8" style="font-weight: bold; background-color: #add8e6; text-align: center; text-decoration: underline;">P1Books table</th>
			</tr>
			<tr>
				<th style="background-color: #add8e6; font-weight: bold;">BookID</th>
				<th style="background-color: #add8e6; font-weight: bold;">Title</th>
				<th style="background-color: #add8e6; font-weight: bold;">Author</th>
				<th style="background-color: #add8e6; font-weight: bold;">Topic</th>
				<th style="background-color: #add8e6; font-weight: bold;">Genre</th>
				<th style="background-color: #add8e6; font-weight: bold;">ISBN</th>
				<th style="background-color: #add8e6; font-weight: bold;">DatePublished</th>
				<th style="background-color: #add8e6; font-weight: bold;">Hardcover</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="4" style="text-align: center; font-style:italic;">Information pulled from MySQL Database</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			//loop results
			for( $i=0; $i<$num_results; $i++)
			{
				//store single record from $result to $row
				$row = mysqli_fetch_array($result);
				
				//below, ALWAYS use trim() on data from the database
				?>
				<tr>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BookID"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Title"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Author"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Topic"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Genre"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ISBN"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["DatePublished"] ) ); ?></td>
					<td><?php echo( trim( $row["Hardcover"] ) ); ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	
	<p>&nbsp;</p>
	
	
<?php 
	//close connection
	include("includes/closeDbConn.php");
?>

</br>
	
<p style="text-align: center; font-weight: bold;">
	<a href="index.php">Return to Default Page</a>
</p>
	
</body>
</html>