<?php 
//use sesion object
session_start();

//data comes from form
//addslashes escape special characters, like an apostrphe
$BookID 		= $_POST["bookID"];			//Must only be a number. Check is below
$Title 			= addslashes($_POST["title"]);		
$Author 		= addslashes($_POST["author"]);			//Dropdown. No slashes.
$Topic		 	= $_POST["topic"]; 
$Genre		 	= $_POST["genre"];
$ISBN		 	= addslashes($_POST["isbn"]);
$StartMonth 	= $_POST["startMonth"];			//Dropdown. No slashes.
$StartDay 		= $_POST["startDay"]; 				//Dropdown. No slashes.
$Hardcover 		= $_POST["hardCover"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Title 	= str_replace($removeThese, "", $Title);
$Author	= str_replace($removeThese, "", $Author);
$ISBN	= str_replace($removeThese, "", $ISBN);

if(($BookID=="") || ($Title=="") || ($Author=="") || ($Topic=="- Topic -") || ($Genre=="") || ($ISBN=="") || ($StartMonth=="- Month -") || ($StartDay=="- Year -") || ($Hardcover=="")
{ 		//Ensure forms arent empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateProject.php");
	exit;
}
else if(!is_numeric($BookID)) 
{ //must be a number
	$_SESSION["errorMessage"] = "You must enter a number for BookID!";
	header("Location: updateBook.php");
	exit;
}
else if(strlen($ISBN < 13)) 
{ //must be a number
	$_SESSION["errorMessage"] = "ISBN must have 13 characters";
	header("Location: insertBook.php");
	exit;
}
else
{ 
	//No found errors
	$_SESSION["errorMessage"] = "";
}

//DB Connection point
//Waits till after potential redirects happen
include("includes/openDbConn.php");

$DatePublished = $StartMonth." ".$StartDay;


//Prepare SQL Statement
$sql = "UPDATE P1Books SET Title='".$Title."', Author='".$Author."', Topic='".$Topic."', Genre='".$Genre."', ISBN='".$ISBN."', DatePublished='".$DatePublished."', Hardcover='".$Hardcover."' WHERE BookID=".$BookID;

//execute SQL Query and store the result of execution in $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect
header("Location: select.php");
exit;
?>