<?php

    $name = $_POST['name'];
	$website = $_POST['website'];
	

$mysqli = new mysqli('localhost', 'designpr_linku', 'linkusystems', 'designpr_preview') or die(mysqli_error($mysqli));



if(isset($_POST['save'])){

	$add_user = $mysqli->query("INSERT INTO `data` (`Name`, `website`) VALUES('$name', '$website')") or die($mysqli->error);

 	if($add_user){
 		header("location:index.php");
 	}
}

// delete the entry

if(isset($_GET['delete'])){

	$delete = $_GET['delete'];

$delete_complete = $mysqli->query("DELETE FROM data WHERE id= $delete");


	if($delete_complete){
		header("location:index.php");
		}
}


//check if domain name is pointed to linku
function checkDomain($websiten){
    $site = @dns_get_record($websiten, DNS_NS);
    $linku1 = 'ns1.linkusystems.net';
    $linku2 = 'ns2.linkusystems.net';

    
    
    if($site[0]['target'] === $linku2){
        echo '<span class="liveColor"> </span>';

    }else if($site[0]['target'] === $linku1){
        echo '<span class="liveColor"> </span>';
    }
    else {
        echo '<span class="statusColor"> </span>';
    }
}

mysqli_close($mysqli);

?>