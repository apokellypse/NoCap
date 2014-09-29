<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Upload a File</title>
</head>
<body>

<?php // Script 11.4 upload_file.php
/*this displays and handles an html form, taes a file upload and stores it*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //handle the form.

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["the_file"]["name"]);
$extension = end($temp);

echo "Type is " . $_FILES["the_file"]["type"];
echo "Extension is " . $extension;

if ((($_FILES["the_file"]["type"] == "image/gif")
	|| ($_FILES["the_file"]["type"] == "image/jpeg")
	|| ($_FILES["the_file"]["type"] == "image/jpg")
	|| ($_FILES["the_file"]["type"] == "image/pjpeg")
	|| ($_FILES["the_file"]["type"] == "image/x-png")
	|| ($_FILES["the_file"]["type"] == "image/png"))
	&& ($_FILES["the_file"]["size"] < 2000000)
	&& in_array($extension, $allowedExts)) {
	if ($_FILES["the_file"]["error"] > 0) {
		echo "Error: " . $_FILES["the_file"]["error"] . "<br>";
	} else {
	echo "Upload: " . $_FILES["the_file"]["name"] . "<br>";
	echo "Type: " . $_FILES["the_file"]["name"] . "<br>";
	echo "Size: " . ($_FILES["the_file"]["size"] / 1024) . " kB<br>";
	echo "Temp file: " . $_FILES["the_file"]["tmp_name"] . "<br>";
		if (file_exists("../../uploads/{$_FILES['the_file']['name']}")) {
			echo $_FILES["the_file"]["name"] . " already exists. ";
		} else {
			if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../../uploads/{$_FILES['the_file']['name']}")) {
			print '<p>Your file has been uploaded.</p>';

		} else { //problem
			print '<p style="color: red;">Your file could not be uploaded because: ';

			//print message based on error:

			switch ($_FILES['the_file']['error']) {
				case 1:
					print 'exceeded max upload size';
					
					break;
				case 2:
					print 'exceed max file size in html form';
					break;
				case 3:
					print 'partial upload';
					break;
				case 4:
					print 'no file uploaded';
					break;
				case 6:
					print 'temp folder dne';
					break;
				default:
					print 'idk';
					break;
			}

			print '.</p>'; //finish paragraph
		} //end of move_uploaded_file() if.


		}
	}
} else {
	echo "Invalid file";
}

//Try to move the uploaded file

	

} //end of submission if

//leave php and display form
?>

<form action="upload_file.php" enctype="multipart/form-data" method="post">
	<p>Upload a file using this form:</p>
	<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
	<p><input type="file" name="the_file"></p>
	<p><input type="submit" name="submit" value="Upload This File"></p>
</form>

</body>
</html>
