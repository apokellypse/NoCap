<?php

//this is the dir where images will be saved
$target = "images/";
$target = $target . basename( $_FILES['photo']['name']);

//this gets all other info from form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pic = ($_FILES['photo']['name']);

//connecs to your database
mysql_connect("")