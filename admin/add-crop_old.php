<?php 

//lets add configuraiton 
require("../config.php");



// lets check if any new category is posted to this page via form Post method
if (count($_POST)>0) {
   
    $is_error = false;
    $errors = [];



    // lets recieve the posted data..
    $name = $_POST['crop_name'];
    $descp = $_POST['crop_descp'];
    $cat_type = $_POST['cat_type'];



    // lets validate the posted data now..
    if (empty($_POST['crop_name'])) {
        $errors['crop_name'] = "Please fill the category name";
        $is_error = true;
    }

    

    // lets check if there is any error on this script or not..
    if ($is_error==false) {
        
        // lets build the sql query now to insert data into table.

        // escape strings.

       

        //$name = $conn->real_escape_string($name);
        //$descp = $conn->real_escape_string($descp);

       echo  $sql = "INSERT INTO product (product_name,product_descp,category_id) values('$name', '$descp' , $cat_type)";

    

        // lets send the query to database now..
        $db_response = $conn->query($sql);
       
        // check if there is no error in the db response
        if ($db_response) {
            
            // lets redirect the user to the category listing page..
            header("Location:list-product.php?success=Record Created Successfully");

            // lets end the script here now.
            exit();
        } else {

            // else mention the error string...
            $is_error = true;
            echo $error_string = "Failed in insertion to Database." . $conn->error; 

        }
    
    }

}

// fetch all categories..
$sql = "SELECT * FROM category";
$db_result = $conn->query($sql);

?>
<!Doctype html>
<html>
    <head>
    
    <!-- lets add css files -->
    <link href="css/style.css" rel="stylesheet" />

    </head>
    <body>

        <div>
            <div class="row">
                <div class="col center">
                    <form action="add-crop.php" method="POST">
                        <table>
                            <tr>
                                <td>Crop Name:</td>
                                <td><input name="crop_name" type="text" /></td>
                            </tr>
                            <tr>
                                <td>Cateogry:</td>
                                <td>
                                    <select name="cat_type">
                                        <option value="">Select</option>
                                        <?php while ($row = $db_result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                    
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Crop Description:</td>
                                <td><textarea name="crop_descp"></textarea></td>
                            </tr>

                            <tr>
                                <td>Crop Image:</td>
                                <td><input type="file" /></td>
                            </tr>
                            <tr>
                                
                                <td rowspan="2"><input type="submit" value="Add Crop" /></td>
                            </tr>

                    </form>
                </div>

            </div>
        
        </div>

    </body>
</html>