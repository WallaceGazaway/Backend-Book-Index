<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

	include("includes/openDbConn.php");
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 1 - Update Book</title>
	<style type="text/css">
		form{ width:400px; margin:0px auto;}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px;}
		ul li span{ color:#0000ff; font-weight: bold;}
		ul li span#radio{color:black; font-weight:normal; padding:0px; margin-right:130px;}
		ul li input, ul li select{ float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		input#submit {width:248px;}
		ul li input[type="radio"]{float:none; margin-right:0px; padding:0px; width:40px;}
		ul li input[type="checkbox"]{float:none; margin-right:0px; padding:0px; width:40px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 1 - Update Book</h1>
	<?php 
		include("includes/menu.php");

		$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books WHERE BookID=32";

		$result = mysqli_query($db, $sql);

		if(empty($result))
		{
			$num_results = 0;
		}
		else
		{
			$num_results = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
		}

		if($num_results == 0)
			$_SESSION["errorMessage"] = "You must first insert a Book with ID 32";
	?>

	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doUpdateBook.php">
		<fieldset>
			<legend>Update P1Books table</legend>
			<ul>
				<li><label title="BookID" for="bookIDdis">Book ID</label>
					<input name ="bookIDdis" id ="bookIDdis" type="text" size="20" maxlength="3"
						value="<?php if($num_results != 0){echo( trim($row["BookID"]) );} ?>" disabled="disabled"/>
					<input name ="bookID" id ="bookID" type="hidden" size="20" maxlength="3"
						value="<?php if($num_results != 0){echo( trim($row["BookID"]) );} ?>" />
				</li>

				<li><label title="Title" for="title">Title</label>
					<input name ="title" id ="title" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Title"]) );} ?>"/>
				</li>

				<li><label title="Author" for="author">Author</label>
					<input name ="author" id ="author" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["Author"]) );} ?>"/>
				</li>

				<li><label title="Topic" for="topic">Topic</label>
				<select name="topic" id="topic">
                	<option value="- Topic -">- Topic -</option>
                	<option value="Airplanes"   <?php if( ($num_results != 0) && (trim($row["Topic"])=="Airplanes") ){echo("selected='selected'");} ?>>Airplanes</option>
                	<option value="Animals"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Animals") ){echo("selected='selected'");} ?>>Animals</option>
					<option value="Arts"   		<?php if( ($num_results != 0) && (trim($row["Topic"])=="Arts") ){echo("selected='selected'");} ?>>Arts</option>
                	<option value="Biographies" <?php if( ($num_results != 0) && (trim($row["Topic"])=="Biographies") ){echo("selected='selected'");} ?>>Biographies</option>
					<option value="ComingofAge" <?php if( ($num_results != 0) && (trim($row["Topic"])=="ComingofAge") ){echo("selected='selected'");} ?>>Coming of Age</option>
                	<option value="Family"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Family") ){echo("selected='selected'");} ?>>Family</option>
					<option value="Growth"   	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Growth") ){echo("selected='selected'");} ?>>Growth</option>
                	<option value="Heroes"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Heroes") ){echo("selected='selected'");} ?>>Heroes</option>
					<option value="History"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="History") ){echo("selected='selected'");} ?>>History</option>
					<option value="Interior"   	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Interior") ){echo("selected='selected'");} ?>>Interior Design</option>
                	<option value="Jewels"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Jewels") ){echo("selected='selected'");} ?>>Jewels</option>
					<option value="Killers"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Killers") ){echo("selected='selected'");} ?>>Killers</option>
					<option value="Legends"   	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Legends") ){echo("selected='selected'");} ?>>Legends</option>
                	<option value="Loss"  		<?php if( ($num_results != 0) && (trim($row["Topic"])=="Loss") ){echo("selected='selected'");} ?>>Loss</option>
					<option value="Monsters"  	<?php if( ($num_results != 0) && (trim($row["Topic"])=="Monsters") ){echo("selected='selected'");} ?>>Monsters</option>
       			</select>
				</li>

				<li><label title="Genre" for="genre">Genre</label>
					<span id="radios" style="float: right;">
						<input name ="genre" id ="genre" type="radio" value="Comedy" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Comedy") ){echo(" checked='checked'");} ?>/>Comedy
						<input name ="genre" id ="genre" type="radio" value="Dystopian" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Dystopian") ){echo(" checked='checked'");} ?>/>Dystopian
						<input name ="genre" id ="genre" type="radio" value="Fantasy" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Fantasy") ){echo(" checked='checked'");} ?>/>Fantasy
						<input name ="genre" id ="genre" type="radio" value="Fiction" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Fiction") ){echo(" checked='checked'");} ?>/>Fiction
						<input name ="genre" id ="genre" type="radio" value="Horror" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Horror") ){echo(" checked='checked'");} ?>/>Horror
						<input name ="genre" id ="genre" type="radio" value="Mystery" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Mystery") ){echo(" checked='checked'");} ?>/>Mystery
						<input name ="genre" id ="genre" type="radio" value="Nonfiction" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Nonfiction") ){echo(" checked='checked'");} ?>/>Nonfiction
						<input name ="genre" id ="genre" type="radio" value="Scifi" <?php if( ($num_results != 0) && (trim($row["Genre"])=="Scifi") ){echo(" checked='checked'");} ?>/>Scifi
						<input name ="genre" id ="genre" type="radio" value="War" <?php if( ($num_results != 0) && (trim($row["Genre"])=="War") ){echo(" checked='checked'");} ?>/>War
					</span>
				</li>

				<li><label title="ISBN" for="isbn">ISBN</label>
					<input name ="isbn" id ="isbn" type="text" size="20" maxlength="13"
						value="<?php if($num_results != 0){echo( trim($row["ISBN"]) );} ?>"/>
				</li>
				<?php
				
				//Date is stored as Month Day. Get month with substream of whole string, starting from pos 0 to space " "
				//Get day with substream of whole, starting from space "" and going to length (last character)
				$StartMonth = trim( substr(trim($row["DatePublished"]), 0, strpos(trim($row["DatePublished"]), " ")) );
				$StartDay	= trim( substr(trim($row["DatePublished"]), strpos(trim($row["DatePublished"]), " "), strlen(trim($row["DatePublished"]))) );
			
				?>
				<li><label title="StartMonth" for="startMonth">Publication Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Month -">- Publish Month -</option>
                <option value="Jan" <?php if( ($num_results != 0) && ($StartMonth=="Jan") ){echo("selected='selected'");} ?>>Jan</option>
				<option value="Feb" <?php if( ($num_results != 0) && ($StartMonth=="Feb") ){echo("selected='selected'");} ?>>Feb</option>
				<option value="Mar" <?php if( ($num_results != 0) && ($StartMonth=="Mar") ){echo("selected='selected'");} ?>>Mar</option>
				<option value="Apr" <?php if( ($num_results != 0) && ($StartMonth=="Apr") ){echo("selected='selected'");} ?>>Apr</option>
				<option value="May" <?php if( ($num_results != 0) && ($StartMonth=="May") ){echo("selected='selected'");} ?>>May</option>
				<option value="Jun" <?php if( ($num_results != 0) && ($StartMonth=="Jun") ){echo("selected='selected'");} ?>>Jun</option>
				<option value="Jul" <?php if( ($num_results != 0) && ($StartMonth=="Jul") ){echo("selected='selected'");} ?>>Jul</option>
				<option value="Aug" <?php if( ($num_results != 0) && ($StartMonth=="Aug") ){echo("selected='selected'");} ?>>Aug</option>
				<option value="Sep" <?php if( ($num_results != 0) && ($StartMonth=="Sep") ){echo("selected='selected'");} ?>>Sep</option>
				<option value="Oct" <?php if( ($num_results != 0) && ($StartMonth=="Oct") ){echo("selected='selected'");} ?>>Oct</option>
				<option value="Nov" <?php if( ($num_results != 0) && ($StartMonth=="Nov") ){echo("selected='selected'");} ?>>Nov</option>
				<option value="Dec" <?php if( ($num_results != 0) && ($StartMonth=="Dec") ){echo("selected='selected'");} ?>>Dec</option>
        		</select>
				</li>

				<li><label title="StartDay" for="startDay">Publication Year</label>
				<select name="startDay" id="startDay">
                <option value="- Year -">- Publish Year -</option>
                <option value="1995" <?php if( ($num_results != 0) && ($StartDay=="1995") ){echo("selected='selected'");} ?>>1995</option>
				<option value="1996" <?php if( ($num_results != 0) && ($StartDay=="1996") ){echo("selected='selected'");} ?>>1996</option>
				<option value="1997" <?php if( ($num_results != 0) && ($StartDay=="1997") ){echo("selected='selected'");} ?>>1997</option>
				<option value="1998" <?php if( ($num_results != 0) && ($StartDay=="1998") ){echo("selected='selected'");} ?>>1998</option>
				<option value="1999" <?php if( ($num_results != 0) && ($StartDay=="1999") ){echo("selected='selected'");} ?>>1999</option>
				<option value="2000" <?php if( ($num_results != 0) && ($StartDay=="2000") ){echo("selected='selected'");} ?>>2000</option>
				<option value="2001" <?php if( ($num_results != 0) && ($StartDay=="2001") ){echo("selected='selected'");} ?>>2001</option>
				<option value="2002" <?php if( ($num_results != 0) && ($StartDay=="2002") ){echo("selected='selected'");} ?>>2002</option>
				<option value="2003" <?php if( ($num_results != 0) && ($StartDay=="2003") ){echo("selected='selected'");} ?>>2003</option>
				<option value="2004" <?php if( ($num_results != 0) && ($StartDay=="2004") ){echo("selected='selected'");} ?>>2004</option>
				<option value="2005" <?php if( ($num_results != 0) && ($StartDay=="2005") ){echo("selected='selected'");} ?>>2005</option>
				<option value="2006" <?php if( ($num_results != 0) && ($StartDay=="2006") ){echo("selected='selected'");} ?>>2006</option>
				<option value="2007" <?php if( ($num_results != 0) && ($StartDay=="2007") ){echo("selected='selected'");} ?>>2007</option>
				<option value="2008" <?php if( ($num_results != 0) && ($StartDay=="2008") ){echo("selected='selected'");} ?>>2008</option>
				<option value="2009" <?php if( ($num_results != 0) && ($StartDay=="2009") ){echo("selected='selected'");} ?>>2009</option>
				<option value="2010" <?php if( ($num_results != 0) && ($StartDay=="2010") ){echo("selected='selected'");} ?>>2010</option>
				<option value="2011" <?php if( ($num_results != 0) && ($StartDay=="2011") ){echo("selected='selected'");} ?>>2011</option>
				<option value="2012" <?php if( ($num_results != 0) && ($StartDay=="2012") ){echo("selected='selected'");} ?>>2012</option>
				<option value="2013" <?php if( ($num_results != 0) && ($StartDay=="2013") ){echo("selected='selected'");} ?>>2013</option>
				<option value="2014" <?php if( ($num_results != 0) && ($StartDay=="2014") ){echo("selected='selected'");} ?>>2014</option>
				<option value="2015" <?php if( ($num_results != 0) && ($StartDay=="2015") ){echo("selected='selected'");} ?>>2015</option>
				<option value="2016" <?php if( ($num_results != 0) && ($StartDay=="2016") ){echo("selected='selected'");} ?>>2016</option>
				<option value="2017" <?php if( ($num_results != 0) && ($StartDay=="2017") ){echo("selected='selected'");} ?>>2017</option>
				<option value="2018" <?php if( ($num_results != 0) && ($StartDay=="2018") ){echo("selected='selected'");} ?>>2018</option>
				<option value="2019" <?php if( ($num_results != 0) && ($StartDay=="2019") ){echo("selected='selected'");} ?>>2019</option>
				<option value="2020" <?php if( ($num_results != 0) && ($StartDay=="2020") ){echo("selected='selected'");} ?>>2020</option>
				<option value="2021" <?php if( ($num_results != 0) && ($StartDay=="2021") ){echo("selected='selected'");} ?>>2021</option>
				<option value="2022" <?php if( ($num_results != 0) && ($StartDay=="2022") ){echo("selected='selected'");} ?>>2022</option>
        		</select>
				</li>

				<!-- It is possible that for a single checkbox all I need is to have an else echo statement to recognize that it is unchecked. However, I might also need an else if to recognize it = 0 -->

				<li><label title="Hardcover" for="hardCover">Hardcover?</label>
					Yes <input name ="hardCover" id ="hardCover" type="checkbox" value="Yes" <?php if( ($num_results != 0) && (trim($row["Hardcover"])=="Yes") ){echo(" checked='checked'");}else{echo(" checked='unchecked'")} ?>/>
					<!-- No <input name ="hardCover" id ="hardCover" type="checkbox" value="No" <?php if( ($num_results != 0) && (trim($row["Hardcover"])=="No") ){echo(" checked='checked'");} ?> /> -->
				</li>


				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Update Book" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type = "text/javascript">
		document.getElementById("title").focus();
	</script>
	
</body>
</html>