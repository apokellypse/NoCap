<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Kelly Yu">
		<meta name="keywords" content="Kelly Yu, Kelly, Yu, apokellypse, Cornell, student, CS, compsci, computer science">
		<meta name="description" content="Kelly Yu's Testing Site, set aside for demos, archived material, and more. Kelly Yu is an undergraduate student studying Computer Science at Cornell University.">
		<title>Kelly Yu | Big Red Hacks</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="something.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/snap.js"></script>
		<script type="text/javascript" src="scripts/script.js"></script>
	</head>
	<body>

<?php // Script 11.4 upload_file.php
/*this displays and handles an html form, taes a file upload and stores it*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //handle the form.

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["the_file"]["name"]);
$extension = end($temp);

// echo "Type is " . $_FILES["the_file"]["type"];
// echo "Extension is " . $extension;

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
	// echo "Upload: " . $_FILES["the_file"]["name"] . "<br>";
	// echo "Type: " . $_FILES["the_file"]["type"] . "<br>";
	// echo "Size: " . ($_FILES["the_file"]["size"] / 1024) . " kB<br>";
	// echo "Temp file: " . $_FILES["the_file"]["tmp_name"] . "<br>";
		if (file_exists("../../uploads/{$_FILES['the_file']['name']}")) {
			echo $_FILES["the_file"]["name"] . " already exists. ";
		} else {
			if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../../uploads/{$_FILES['the_file']['name']}")) {
				print '<div class="phpsuccess">Your file has been uploaded.</div>';
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
	echo '<div class="phpnotice">Invalid file</div>';
}

} //end of submission if

//leave php and display form
?>

		<div id="container">
			<section id="sidebar">
				<div class="logo">
					<a href="index.php"><h1>No<span class="yel">Cap</span></h1></a>
				</div>
				<div class="upload">
					<a href="#"><h2 id="upload">Upload</h2></a>
					<form action="index.php" method="post"
					enctype="multipart/form-data">
					<label for="file">Filename:</label>
					<input type="file" name="the_file" id="file"><br>
					<input type="submit" name="submit" value="Submit">
					</form>
				</div>
				<div class="gallery">
					<h2>Gallery</h2>
				</div>
				<hr>
			</section>
			
			<section>
				<p class="header">Pictures can speak for themselves. Goodbye,&nbsp;<span class="yel">cap</span>tions.</p>
				<p class="subheader"><span class="pur">scroll to learn more</span></p>
			</section>

			<section>
				<p class="header">NoCap is a <span class="pur">different</span> approach to experiencing your photos. We <span class="red">take&nbsp;away the&nbsp;clutter</span> of tagging, filters, the buttons for a million different functions you don't really need.</p>
			</section>

			<section>
				<p class="header">Here, you only need <span class="pur">two</span>: a&nbsp;button&nbsp;to&nbsp;upload, and a button to view your gallery. We take care of the <span class="pur">presentation</span>, using state-of-the-art methods to <span class="pur">collage</span> your photos <span class="red">beautifully and responsively</span>. </p>
			</section>

			<section>
				<p class="header">At NoCap we sincerely believe that each picture is worth <em>at&nbsp;least</em> <span class="pur">a&nbsp;thousand&nbsp;words</span>, and that they should speak for themselves, <span class="pur">without&nbsp;the&nbsp;aid&nbsp;of&nbsp;captions</span>. </p>
			</section>

			<section>
				<p class="header">Our mission is to provide an <span class="red">intimate, personalized</span> gallery that you can add to at any&nbsp;time, anywhere.</p>
			</section>

		</div>
	</body>
</html>