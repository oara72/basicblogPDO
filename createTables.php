<html>
<head>
<title>Creating Tables</title>
</head>
<body style="background-color: rgb(195,235,215)">

<?php

//set the variable for the database access:
require_once('includes/config.php');

$db= Database::getConnection();
//Create an empty array called $queryArray.
$queryArray = array();

// Insert Table Structure

$query = "CREATE table blog_posts 
	(postID INT AUTO_INCREMENT PRIMARY KEY, 
	postTitle VARCHAR(255), 
	postDesc TEXT,
	postCont TEXT,
	postDate DATETIME)";
array_push($queryArray, $query);

// Insert Table Members

$query = "CREATE TABLE blog_members 
(memberID INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(255), 
    password VARCHAR(255),  
    email VARCHAR(255),
    verifystring VARCHAR(20),
	active TINYINT)";
array_push($queryArray, $query);

// insert administrador

$query="INSERT INTO blog_members VALUES('0','oliver', 'alexander', 'rodriguezarrocha@gmail.com', '', '1')";
array_push($queryArray, $query);

//Use a foreach looping structure to iterate over the array of queries
foreach($queryArray as $query){
    $dbc->sqlBindQuery($query);
}


?>

</body>
</html>
