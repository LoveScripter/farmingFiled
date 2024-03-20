<?php 

//lets add configuraiton 
require("../config.php");

// check if user is logged in or not
require("verify-user.php");



// lets check if any new category is posted to this page via form Post method
if (count($_POST)>0) {
   
    $is_error = false;
    $errors = [];


    // lets recieve the posted data..
    $name = $_POST['category_name'];
    $descp = $_POST['category_descp'];
    $unique_name = $_POST['unique_name'];


    // lets validate the posted data now..
    if (empty($_POST['category_name'])) {

        $errors['category_name'] = "Please fill the category name";
        $is_error = true;
    }

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
    

    // lets check if there is any error on this script or not..
    if ($is_error==false) {
        
        // lets build the sql query now to insert data into table.

        // escape strings.
        $name = $conn->real_escape_string($name);
        $descp = $conn->real_escape_string($descp);

        // Lets uplaod image to db. we name simple unique timestamp  to images before uploading, it should be more hard to prevent duplication.

        //lets loop through all images one by one
  
        $upload_dir = "../uploads/";
        $final_image = uniqid() . "_" .  $uploaded_image_name;

        move_uploaded_file($_FILES['image']['tmp_name'],$upload_dir . $final_image );

        // code for multiple uploads
        /* foreach ($_FILES['images']['name'] as $key => $val) {
            $fileName = basename($_FILES['images']['name'][$key]); 

            move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_dir . $fileName );
            $image_array[$key] = $fileName;
        } */

        $sql = "INSERT INTO category (category_name,category_descp,category_image,unique_name) values('$name', '$descp','$final_image','$unique_name')";

        // lets send the query to database now..
        $db_response = $conn->query($sql);
       
        // check if there is no error in the db response
        if ($db_response) {

            // lets redirect the user to the category listing page..
            header("Location:list-category.php?success=Record Created Successfully");

            // lets end the script here now.
            exit();

            
        } else {

            // make sure to delete move uploaded files if nothing inserted into db...

            // else mention the error string...
            $is_error = true;
            echo $error_string = "Failed in insertion to Database." . $conn->error; 

        }
    
    }

}

require_once("header.php");
?>
 <div class="content-area">
                    <div class="inner-main">
                    <h2>Add New Category</h2>
                    <?php if (isset($is_error) && $is_error==true) {
                         $err_msg = '<p class="error">';
                        foreach ($errors as $Key=>$value) {

                            $err_msg = $err_msg . "<span style='display:block;padding-bottom:8px;'>" . $value . "</span>";
                            
                        }

                        $err_msg = $err_msg . "</p>";
                         echo $err_msg;
                        
                        } ?>

                    <div>
                        <form action="add-category.php" method="POST" enctype="multipart/form-data">
                            <div class="table">
                                <div class="tr">
                                    <div class="cell"><strong>Name:</strong></div>
                                    <div class="cell"><input type="text" name="category_name" value="<?php echo (isset($_POST['category_name']))?$_POST['category_name']:''; ?>" /> </div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>Unique Name:</strong></div>
                                    <div class="cell"><input type="text" name="unique_name" value="<?php echo (isset($_POST['unique_name']))?$_POST['unique_name']:''; ?>" /> </div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>Description:</strong> </div>
                                    <div class="cell"><textarea class="rich-editor" name="category_descp"><?php echo (isset($_POST['category_descp']))?$_POST['category_descp']:''; ?></textarea></div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>Category Image:</strong> </div>
                                    <div class="cell"><input type="file" name="image" /></div>
                                </div>
                         

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
