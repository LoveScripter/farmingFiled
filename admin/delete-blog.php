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
    header("Location:list-blog.php?error=Invalid Deletion");
}

// Lets select the information for the database now..
$sql = "SELECT * FROM blog WHERE id=" . $id;

// now send the query to database now..
$db_response = $conn->query($sql);

$blog_info = $db_response->fetch_assoc();

// lets build the sql query for delete..
$sql = "DELETE FROM blog WHERE id=" . $id;

// send the query to database.
$db_response = $conn->query($sql);

//lets check if the response went through.
if ($db_response) {


    $fpath = "../uploads/" . $blog_info['blog_image'];

    //lets Delete the file from directory... 
    if (file_exists($fpath)) {
        unlink($fpath);
    }

    header("Location:list-blog.php?success=Blog Deleted Successfully");
} else {
    header("Location:list-blog.php?error=Error in deleting Blog.");
}


?>