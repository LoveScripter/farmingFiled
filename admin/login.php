<?php 

// db config..
require("../config.php");

if (count($_POST)>0) {
   
    $is_error = false;
    $errors = [];


    // lets recieve the posted data..
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];


    // lets validate the posted data now..
    if (empty($_POST['user_email'])) {

        $errors['user_email'] = "Please fill the User name";
        $is_error = true;
    }

    // lets check if there is any error on this script or not..
    if ($is_error==false) {
        
        // lets build the sql query now to insert data into table.

        // escape strings.
        $name = $conn->real_escape_string($email);
        $descp = $conn->real_escape_string($password);

        $sql = "SELECT * FROM admin WHERE email='$email' AND password='" . md5($password) . "'";
      
        // lets send the query to database now..
        $db_response = $conn->query($sql);
        $row = $db_response->fetch_assoc();
      

        // check if there is no error in the db response
        if ($db_response->num_rows>0){

            // lets redirect the user to the category listing page..
            

            $_SESSION['admin_id'] = $row['id'];


            header("Location:dashboard.php?success=Record Created Successfully");

            // lets end the script here now.
            exit();

            
        } else {

            // make sure to delete move uploaded files if nothing inserted into db...

            // else mention the error string...
            $is_error = true;
            $errors['error'] = "Invalid Username and password";


        }
    
    }

}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- include script.js -->
        <script src="js/script.js" ></script>

        <!-- lets add two style files-->
        <link href="css/normalize.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

<style>
    #main {
        background: gainsboro;
        width: 400px;
        margin: 0 auto;
        
    }
    h2 {
        text-align: center;
        padding: 18px;
        background: #917777;
        color: white;
        margin-top: 32px;
    }
    form {
    text-align: center;
    padding: 32px;
    border-radius: 8px;
    }
    .btn {
        background:black;
        color:white;
    }
</style>
    </head>
    <body>

        <div class="">
            <div class="row">
            <div class="col">
                <div id="main">
                <h2>Login</h2>
                <?php if (isset($is_error) && $is_error==true) {
                         $err_msg = '<p class="error">';
                        foreach ($errors as $Key=>$value) {

                            $err_msg = $err_msg . "<span style='display:block;padding-bottom:8px;'>" . $value . "</span>";
                            
                        }

                        $err_msg = $err_msg . "</p>";
                         echo $err_msg;
                        
                        } ?>
                <form action="login.php" method="POST" enctype="multipart/form-data">
                   
                    <div class="table">
                        <div class="tr">
                            <div class="cell"><strong>User Email:</strong></div>
                            <div class="cell"><input type="text" name="user_email"  /> </div>
                        </div>
                        <div class="tr">
                            <div class="cell"><strong>User Password:</strong></div>
                            <div class="cell"><input type="password" name="user_password"  /> </div>
                        </div>
                        
                        
                        <div class="tr">
                            <div class="cell"></div>
                            <div class="cell"><input type="submit" value="Login" class="btn" /> </div>
                        </div>
                    </div>
                </form>
                </div>

            </div>
        </div>


        </div>
    
    </body>
</html>