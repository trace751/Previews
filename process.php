<?php

$mysqli = new mysqli('localhost', 'root', '', 'preview') or die(mysqli_error($mysqli));


if(isset($_POST['save'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$website = $_POST['website'];

	$mysqli->query("INSERT INTO `data` (`first name`, `last name`, `website`) VALUES('$fname', '$lname', '$website')") or die($mysqli->error);
}


if (isset($_GET['delete'])){

$id = $_GET['delete'];

// delete the entry

$mysqli->query("DELETE FROM data WHERE id= $id") or die(mysql_error());

}