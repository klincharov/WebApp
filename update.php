 <?php 

//var_dump($_POST);

		if(isset($_POST["id"]))
	{
		$id = json_decode($_POST["id"], true);
		//$id = $_POST["id"];
		echo "id set ";
	} else {
		echo "not set";
	}

echo "id is: " + $id;
// 	echo "<br>";

//add connect to db
$servername = "localhost";
$username = "root";
$password = "secret";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// echo "connected";
// echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



   $sql = "UPDATE `suspects` SET `count`= `count`+ 1 WHERE `img` = '".$id."'";

   $conn->query($sql);

   if(mysql_query($sql)){
     return "success!";
     console.log("success");
   } 
   else {
    return "failed!";
    console.log("failed");
  }
$conn->close();
echo "terminated";
  ?>