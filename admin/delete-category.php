<?php 

// This page is for Deleting From the database.

//lets add configuration
require("../config.php");

// check if user is logged in or not
require("verify-user.php");

//lets see any ID is passed to Delete information from db...
$id = (isset($_GET['id']))?$_GET['id']:'';

// check if there is no id.
if (!is_numeric($id)) {
    header("Location:list-category.php?error=Invalid Deletion");
}

// Lets select the information for the database now..
$sql = "SELECT * FROM category WHERE id=" . $id;

// now send the query to database now..
$db_response = $conn->query($sql);

$category_info = $db_response->fetch_assoc();

// lets build the sql query for delete..
$sql = "DELETE FROM category WHERE id=" . $id;

// send the query to database.
$db_response = $conn->query($sql);

//lets check if the response went through.
if ($db_response) {


    $fpath = "../uploads/" . $category_info['category_image'];

    //lets Delete the file from directory... 
    if (file_exists($fpath)) {
        unlink($fpath);
    }

    header("Location:list-category.php?success=Cateogy Deleted Successfully");
} else {
    header("Location:list-category.php?error=Error in deleting category.");
}


?>