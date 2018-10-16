<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Linku Previews</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<?php require_once 'process.php'; ?>

<?php

  $mysqli = new mysqli('localhost', 'root', '', 'preview') or die(mysqli_error($mysqli));

?>
<form action="process.php" method="POST">
  <input type="text" name="fname" placeholder="First Name">
  <input type="text" name="lname" placeholder="Last Name">
  <input type="text" name="website" placeholder="Website">
  <button type="submit" name="save">Save</button>
</form>
</body>

</html>