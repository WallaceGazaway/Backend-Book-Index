<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 1 - Insert Book</title>
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
	<h1 style="text-align:center">Project 1 - Insert Book</h1>
	<?php 
		include("includes/menu.php");
	?>
	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doInsertBook.php">
		<fieldset>
			<legend>Insert into P1Books table</legend>
			<ul>
				<li><label title="BookID" for="BookID">Book ID</label><input name ="BookID" id ="bookID" type="text" size="20" maxlength="3"/></li>

				<li><label title="Title" for="title">Title</label><input name ="title" id ="title" type="text" size="20" maxlength="50"/></li>

				<li><label title="Author" for="author">Author</label>
					<input name ="author" id ="author" type="text" size="20" maxlength="30"/>
				</li>

				<li><label title="Topic" for="topic">Topic</label>
				<select name="topic" id="topic">
                	<option value="- Topic -">- Topic -</option>
					<option value="Airplanes">Airplanes</option>
                	<option value="Animals">Animals</option>
                	<option value="Arts">Arts</option>
					<option value="Biographies">Biographies</option>
					<option value="ComingofAge">Coming of Age</option>
					<option value="Family">Family</option>
					<option value="Growth">Growth</option>
					<option value="Heroes">Heroes</option>
					<option value="History">History</option>
					<option value="Interior">Interior Design</option>
					<option value="Jewels">Jewels</option>
					<option value="Killers">Killers</option>
					<option value="Legends">Legends</option>
					<option value="Loss">Loss</option>
					<option value="Monsters">Monsters</option>
       			</select>
				</li>

				<li><label title="Genre" for="genre">Genre</label>
					<span id="radios" style="float: right;">
						<input name ="genre" id ="genre" type="radio" value="Comedy"/>Comedy
						<input name ="genre" id ="genre" type="radio" value="Dystopian"/>Dystopian
						<input name ="genre" id ="genre" type="radio" value="Fantasy"/>Fantasy
						<input name ="genre" id ="genre" type="radio" value="Fiction"/>Fiction
						<input name ="genre" id ="genre" type="radio" value="Horror"/>Horror
						<input name ="genre" id ="genre" type="radio" value="Mystery"/>Mystery
						<input name ="genre" id ="genre" type="radio" value="Nonfiction"/>Nonfiction
						<input name ="genre" id ="genre" type="radio" value="Scifi"/>Scifi
						<input name ="genre" id ="genre" type="radio" value="War"/>War
					</span>
				</li>

				<li><label title="ISBN" for="isbn">ISBN</label>
					<input name ="isbn" id ="isbn" type="text" size="20" maxlength="13"/>
				</li>
				
				<li><label title="StartMonth" for="startMonth">Publication Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Month -">- Publish Month -</option>
                <option value="Jan">Jan</option>
				<option value="Feb">Feb</option>
				<option value="Mar">Mar</option>
				<option value="Apr">Apr</option>
				<option value="May">May</option>
				<option value="Jun">Jun</option>
				<option value="Jul">Jul</option>
				<option value="Aug">Aug</option>
				<option value="Sep">Sep</option>
				<option value="Oct">Oct</option>
				<option value="Nov">Nov</option>
				<option value="Dec">Dec</option>
        		</select>
				</li>

				<li><label title="StartDay" for="startDay">Publication Year</label>
				<select name="startDay" id="startDay">
                <option value="- Year -">- Publish Year -</option>
				<option value="25">1995</option>
				<option value="26">1996</option>
				<option value="27">1997</option>
				<option value="28">1998</option>
				<option value="29">1999</option>
                <option value="01">2000</option>
				<option value="02">2001</option>
				<option value="03">2002</option>
				<option value="04">2003</option>
				<option value="05">2004</option>
				<option value="06">2005</option>
				<option value="07">2005</option>
				<option value="08">2006</option>
				<option value="09">2007</option>
				<option value="10">2008</option>
				<option value="11">2009</option>
				<option value="12">2010</option>
				<option value="13">2011</option>
				<option value="14">2012</option>
				<option value="15">2013</option>
				<option value="16">2014</option>
				<option value="17">2015</option>
				<option value="18">2016</option>
				<option value="19">2017</option>
				<option value="20">2018</option>
				<option value="21">2019</option>
				<option value="22">2020</option>
				<option value="23">2021</option>
				<option value="24">2022</option>
        		</select>
				</li>

				<!-- Don't need a yes and no checkbox, change this to a single checkbox with either a default false value or a value of 1 or zero that recognizes being checked as true.
				Then, make an if else statement in post. Something like if value=='1' or 'true' or 'yes' then hardCover/Hardcover='true' and else if it's 0 then set hardCover to false or no -->

				<li><label title="Hardcover" for="hardCover">Hardcover?</label>
					Yes <input type="checkbox" name ="hardCover" id ="hardCover" value="Yes"/>
					<!-- No <input type="checkbox" name ="hardCover" id ="hardCover" value="No"/> -->
				</li>

				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Insert Info" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type = "text/javascript">
		document.getElementById("bookID").focus();
	</script>
	
</body>
</html>