<?php
$id = 0;
		if(isset($_POST["id"]))
	{
		$id = json_decode($_POST["id"], true);
		//$id = $_POST["id"];
		echo "id set ";
	} else {
		echo "not set";
	}

	$timestamp = date("(His-dmy)");
	$jpg = ".jpg";
	//$path = __DIR__ . DIRECTORY_SEPARATOR ."img" ;
	$path = __DIR__ . "\img\\" ;

	$newName = $path . $id . $timestamp . $jpg;
	$oldName = $path . $id . $jpg;

	 // echo "<br>$oldName";
	 // echo "<br>$newName";

//. DIRECTORY_SEPARATOR
//echo $path;
//realpath()
	
if ($success = rename($oldName, $newName)){
	echo $id . " archived!";
} else {
	echo $id . " failed to archive!";
};






?>