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
  $result = $mysqli->query("SELECT * FROM data") or die ($mysqli->error);

  ?>

<?php
  function pre_r( $array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }

?>
<form action="process.php" method="POST">
  <input type="text" name="fname" placeholder="First Name">
  <input type="text" name="lname" placeholder="Last Name">
  <input type="text" name="website" placeholder="Website">
  <button type="submit" name="save">Save</button>
</form>

<div class="wrapper">
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Website</th>
        <th>Action</th>
      </tr>
    </thead>

    <?php
      while ($row = $result->fetch_assoc()):
    ?>
  <tr>
    <td><?php echo $row['first name']; ?></td>
    <td><?php echo $row['last name']; ?></td>
    <td><?php echo $row['website']; ?></td>
    <td>
      <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
      <a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a>
    </td>
  </tr>
<?php endwhile; ?>

  </table>
</div>

</body>
</html>