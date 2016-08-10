<!DOCTYPE html>
<html>
<head>
	<title>Suspects DB</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  	
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>
<!-- jquery & JS -->
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript">
		$("a").click(function() {
        // creating input on-the-fly
        var input = $(document.createElement('input'));
        input.attr("type", "file");
        input.trigger('click'); // opening dialog
        return false; // avoiding navigation
    });

</script>

<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit"> -->

</form>
</body>
</html>


<?php

$servername = "localhost";
$username = "root";
$password = "secret";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
$selectAll = "SELECT * FROM suspects";
$result = $conn->query($selectAll);

if ($result->num_rows > 0) {
			// // prepare the table headers
	echo "<div class=\"container\">";
			echo "<table>
				<tr> 
					<th>Name</th>
					
					<th>Count</th>

					<th>Manage</th>
				</tr>";
	//output data on each row

	while ($row = $result->fetch_assoc()) {
		//variables for easier access
		$name = $row["name"];
		$id = $row["img"];

		//output data for each row
		echo //name with onclick event
		"<tr><td onclick=\"openWin($id)\">"."$name".

		// //middle column with icon for external source (OBSOLETE ?)
		// "<button onclick=\"openWin($id)\"> 
		// <i class=\"fa fa-external-link fa-lg\" aria-hidden=\"true\"></i>
 	// 	<a class=\"thumb\" href=img/$id.jpg></a></button>". 

 		//column count
 		"</td><td class = \"id\" >".$row["count"].
 		"</td><td><div title=\"Archive $id.jpg\" onclick=\"archivePic($id)\">Delete</div>

 			<form action=\"upload.php?id=$id\" method=\"post\"
 				enctype=\"multipart/form-data\"
 				title = \"as $id.jpg\">
    			
    			<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    			<input type=\"submit\" value=\"Upload\" name=\"submit\">
    			<input type=\"hidden\" name=\"id\" value= $id>
    			</form>
 					</td></tr>"; 	
	} 
	echo "</table>";
	echo "</div>";
}


$conn->close();

//echo "Connection closed!"

?>