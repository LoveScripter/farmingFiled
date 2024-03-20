<?php 
// This page is for Deleting From the database.

//lets add configuration
require("../config.php");

//lets see any ID is passed to Delete information from db...
$id = (isset($_GET['id']))?$_GET['id']:'';

// check if there is no id.
if (!is_numeric($id)) {
    header("Location:list-crop.php?error=Invalid Deletion");
}

// lets build the sql query for delete..
$sql = "DELETE FROM product WHERE id=" . $id;

// send the query to database.
$db_response = $conn->query($sql);

//lets check if the response went through.
if ($db_response) {
    header("Location:list-crop.php?success=Category Deleted Successfully");
} else {
    header("Location:list-crop.php?error=Error in deleting category.");
}


?>