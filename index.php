<?php include 'http://designpreview.live/elements/header.php'; ?>


<?php require_once 'process.php'; ?>

<?php

  $mysqli = new mysqli('localhost', 'designpr_linku', 'linkusystems', 'designpr_preview') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT SQL_NO_CACHE * FROM data") or die ($mysqli->error);

  ?>

<?php
  function pre_r( $array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }

?>

<h3>Add in the agents that needs to have domain name updated for ads</h3>
<form action="process.php" method="POST">
  <input type="text" name="name" placeholder="Name">
  <input type="text" name="website" placeholder="Website">
  <button type="submit" name="save">Add</button>
</form>
  <table>
    <thead>
      <tr>
        <th>Status</th>
        <th>Name</th>
        <th>Website</th>
        <th>Action</th>
      </tr>
    </thead>

    <?php
      while ($row = $result->fetch_assoc()):
    ?>
  <tr>
    <td><?php echo checkDomain($row['website']); ?></td>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['website']; ?></td>
    <td>
      <!--<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit">Edit</a>-->
      <a href="process.php?delete=<?php echo $row['id']; ?>" class="delete">Delete</a>
    </td>
  </tr>
<?php endwhile; ?>

  </table>

<?php include 'http://designpreview.live/elements/footer.php'; ?>