<?php 

//lets add configuraiton 
require("../config.php");

// lets check if any new category is posted to this page via form Post method

if (count($_POST)>0) {
   
    $is_error = false;
    $errors = [];

    // lets recieve the posted data..
    $content = $_POST['about_us'];


    // lets validate the posted data now..
    if (empty($_POST['about_us'])) {

        $errors['about_us'] = "Please fill the category name";
        $is_error = true;
    }

    

    // lets check if there is any error on this script or not..
    if ($is_error==false) {
        
        // lets build the sql query now to insert data into table.

        // escape strings.
        $content = $conn->real_escape_string($content);
      

        $sql = "UPDATE pages SET page_text = '$content' WHERE page_name='aboutus'";

        // lets send the query to database now..
        $db_response = $conn->query($sql);
       
        // check if there is no error in the db response
        if ($db_response) {
            
            // lets redirect the user to the category listing page..
            header("Location:aboutus.php?success=Record Created Successfully");

            // lets end the script here now.
            exit();

           
        } else {

            // else mention the error string...
            $is_error = true;
            echo $error_string = "Failed in insertion to Database." . $conn->error; 

        }
    
    }

}

// Lets select the information for the database now..
$sql = "SELECT page_text FROM pages WHERE page_name='aboutus'";

// now send the query to database now..
$db_response = $conn->query($sql);

$row = $db_response->fetch_assoc();

 require("header.php"); ?>
<div class="content-area">
                    <div class="inner-main">
                    <h2>About us</h2>
                    <div>
                        <form action="aboutus.php" method="post" enctype="multipart/form-data">
                            <div class="table">
                 
                                <div class="tr">
                                   
                                    <div class="cell"><textarea class="rich-editor" name="about_us"><?php echo $row['page_text']; ?></textarea></div>
                                </div>
                            
                                <div class="tr">
                                
                                    <div class="cell"><input type="submit" value="submit" class="btn" /> </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    </div>
                </div>
<?php require("footer.php"); ?>