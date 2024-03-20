<?php 

//lets add configuraiton 
require("../config.php");

// check if user is logged in or not
require("verify-user.php");

// Lets select data from the category table..
$category_resultset = $conn->query("SELECT * FROM category");

require("header.php"); ?>
<div class="content-area">
                    <div class="inner-main">
                    <h2>Manage Category</h2>
                    <?php if (isset($_GET['success'])) { 
                        echo  "<p class='success'>" . $_GET['success'] . "</p>"; 
                    } ?>

                    <?php if (isset($_GET['error'])) { 
                        echo  "<p class='error'>" . $_GET['error'] . "</p>"; 
                    } ?>

                    <div><a href="add-category.php" class="btn">Add Category</a></div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                   
                                    <th>Category Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                // Lets check if there is an record and then loop through all records one by one.
                if ($category_resultset->num_rows>0) {
                $upload_dir = "../uploads/";
                while ($row=$category_resultset->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    
                                    <td><a href="<?php echo $upload_dir . $row['category_image']; ?>" target="_BLANK" ><img class="img-normal" src="<?php echo $upload_dir . $row['category_image']; ?>" /></a></td>
                                    <td> <a href="update-category.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green;"></i></a>&nbsp;<a href="delete-category.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></a></td>
                                </tr>

                                <?php } } else {
                                    echo "<h2>There is no Record</h2>";
                                } ?> 
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
<?php require("footer.php"); ?>