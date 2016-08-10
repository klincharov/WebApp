<?php
//echo var_dump($_FILES);r

$target_dir = __DIR__ . "\img\\";

$id = $_POST["id"] . ".jpg";

		if(isset($_POST["id"]))
	{
		$id = json_decode($_POST["id"], true);
		//$id = $_POST["id"];
		echo "id set: " ;
		echo $id;
		echo "<br>";
	} else {
		echo "not set";
	}

$target_file = $target_dir . $id . ".jpg";
echo $target_file;
echo "<br>";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

//Allow certain file formats
if($imageFileType != "jpg") {
    echo "Sorry, only JPG allowed";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to " . $target_file ;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>