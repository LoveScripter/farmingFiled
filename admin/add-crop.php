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
    $name = $_POST['product_name'];
    $descp = $_POST['product_descp'];
    $category_type = $_POST['cat_type'];



    // lets validate the posted data now..
    if (empty($_POST['product_name'])) {

        $errors['product_name'] = "Please fill the category name";
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

        $sql = "INSERT INTO product (product_name,product_descp,cover_image,category_id) values('$name', '$descp','$final_image',$category_type)";

        // lets send the query to database now..
        $db_response = $conn->query($sql);
       
        // check if there is no error in the db response
        if ($db_response) {

            // lets redirect the user to the category listing page..
            header("Location:list-crop.php?success=Record Created Successfully");

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

// fetch all categories..
$sql = "SELECT * FROM category";
$db_result = $conn->query($sql);

require_once("header.php");
?>
 <div class="content-area">
                    <div class="inner-main">
                    <h2>Add New product</h2>
                    <?php if (isset($is_error) && $is_error==true) {
                         $err_msg = '<p class="error">';
                        foreach ($errors as $Key=>$value) {

                            $err_msg = $err_msg . "<span style='display:block;padding-bottom:8px;'>" . $value . "</span>";
                            
                        }

                        $err_msg = $err_msg . "</p>";
                         echo $err_msg;
                        
                        } ?>

                    <div>
                        <form action="add-crop.php" method="POST" enctype="multipart/form-data">
                            <div class="table">
                                <div class="tr">
                                    <div class="cell"><strong>Name:</strong></div>
                                    <div class="cell"><input type="text" name="product_name" value="<?php echo (isset($_POST['product_name']))?$_POST['product_name']:''; ?>" /> </div>
                                </div>

                                <div class="tr">
                                    <div class="cell"><strong>Cateogry :</strong></div>
                                    <div class="cell">

                                        <select name="cat_type">
                                            <option value="">Select</option>
                                            <?php while ($row = $db_result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                    </div>
                                </div>





                                <div class="tr">
                                    <div class="cell"><strong>Description:</strong> </div>
                                    <div class="cell"><textarea class="rich-editor" name="product_descp"><?php echo (isset($_POST['product_descp']))?$_POST['product_descp']:''; ?></textarea></div>
                                </div>
                                <div class="tr">
                                    <div class="cell"><strong>product Image:</strong> </div>
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
