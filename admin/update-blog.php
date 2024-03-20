<?php 
// This page is for udpating the database.

//lets add configuraiton 
require("../config.php");

// check if user is logged in or not
require("verify-user.php");

// lets see if an id is passed to the page via GET or POST
$blog_id = (isset($_POST['id']))?$_POST['id']:$_GET['id'];



// check if there is no category id then Exit the script ..
if (!is_numeric($blog_id)) {
    die("Unauthorized Access");
}

// lets check if any new category is posted to this page via form Post method
if (count($_POST)>0) {
    $is_error = false;
    $errors = [];

    // lets recieve the posted data..
    $name = $_POST['blog_name'];
    $descp = $_POST['blog_text'];


    // lets validate the posted data now..
    if (empty($_POST['blog_name'])) {
        $errors['blog_name'] = "Please fill the Blog name";
        $is_error = true;
    }


    // SEE IF ANY FIle uploaded.
    $uploaded_image_name = "";
    $final_image = "";
    if (!empty($_FILES['image']['name'])) {
        // lets check for files types now.
        $allowed_types = array('jpg','png','jpeg','gif'); 

        $uploaded_image_name = basename($_FILES['image']['name']); 

        // get extension of the uploaded image to validate it.
        $file_type = pathinfo($uploaded_image_name, PATHINFO_EXTENSION); 

        // check if uploaded image is of valid type..
        if (!in_array($file_type,$allowed_types)) {
            $errors['image'] = "Please Choose valid Image";
            $is_error = true;
        }
    }
    
        

    // lets check if there is any error on this script or not..
    if ($is_error==false) {

        //lets escape the query string..
        $name = $conn->real_escape_string($name);
        $descp = $conn->real_escape_string($descp);
        
        // Uploading file.. 
        // In future you shoudl delete the existing uploaded image.
        // check if file uploaded or not 
        $image_query = "";
        if (!empty($uploaded_image_name)) {
            $upload_dir = "../uploads/";
            $final_image = uniqid() . "_" .  $uploaded_image_name;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload_dir . $final_image );
            $image_query = ", blog_image = '$final_image'";
            
        }

        // lets build the sql query now to insert data into table.
        $sql = "UPDATE blog SET blog_name='$name',blog_text = '$descp' $image_query   WHERE id=" . $blog_id;

        // lets send the query to database now..
        $db_response = $conn->query($sql);

        

        // check if there is no error in the db response
        if ($db_response) {
            
            // lets redirect the user to the category listing page..

            header("Location:list-blog.php?success=Record update Successfully");

            // lets end the script here now.
            exit();
        } else {

            // else mention the error string...
            $is_error = true;
            $error['db'] = "Failed in insertion to Database."; 

        }
    
    }

}

// Lets select the information for the database now..
$sql = "SELECT * FROM blog WHERE id=" . $blog_id;

// now send the query to database now..
$db_response = $conn->query($sql);

$blog_info = $db_response->fetch_assoc();

$upload_dir = "../uploads/";

require_once("header.php");
?>
 <div class="content-area">
                    <div class="inner-main">
                    <h2>Update Category</h2>
                    <?php if (isset($is_error) && $is_error==true) {
                         $err_msg = '<p class="error">';
                        foreach ($errors as $Key=>$value) {

                            $err_msg = $err_msg . "<span style='display:block;padding-bottom:8px;'>" . $value . "</span>";
                            
                        }

                        $err_msg = $err_msg . "</p>";
                         echo $err_msg;
                        
                        } ?>
                    <div>
                        <form action="update-blog.php" method="POST" enctype="multipart/form-data">
                            <div class="table">
                                <div class="tr">
                                    <div class="cell"><strong>Name:</strong></div>
                                    <div class="cell"><input name="blog_name" type="text" value="<?php echo $blog_info['blog_name']; ?>"/> </div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>Description:</strong> </div>
                                    <div class="cell"><textarea class="rich-editor"  name="blog_text"><?php echo $blog_info['blog_text']; ?></textarea></div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>Blog Image:</strong> </div>
                                    
                                    <div class="cell"><input type="file" name="image" />
                                        <div><a href="<?php echo $upload_dir . $blog_info['blog_image']; ?>" target="_BLANK" ><img style="margin-top:8px;height:150px;width: 300px;" src="<?php echo $upload_dir . $blog_info['blog_image']; ?>" /></a></div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $blog_id; ?>" name="id" />
                                <div class="tr">
                                    <div class="cell"></div>
                                    <div class="cell"><input type="submit" value="submit" class="btn" /> </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    </div>
                </div>
<?php require("footer.php");