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
	header("Location: insertBook.php");
	exit;
}
else if(!is_numeric($BookID)) 
{ //must be a number
	$_SESSION["errorMessage"] = "You must enter a number for Book ID!";
	header("Location: insertBook.php");
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
	
//Prepare SQL to find if there is already a ShipperID in Database (DB)
$sql = "SELECT BookID FROM P1Books WHERE BookID=" .$BookID;

//Execute SQL and store result. 
$result = mysqli_query($db, $sql);

//Check for records in result. 0 when none found
if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

//Check if CarID is already in DB
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The Book ID you entered already exists!";
	header("Location: insertBook.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

$DatePublished = $StartMonth." ".$StartDay;

//Prepare SQL Statement
$sql = "INSERT INTO P1Books(BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover) VALUES(".$BookID.", '".$Title."', '".$Author."', '".$Topic."', '".$Genre."','".$DatePublished."', '".$Hardcover."')";

//execute SQL Query and store the result of execution in $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect
header("Location: select.php");
exit;
?>