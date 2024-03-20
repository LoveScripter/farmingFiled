<?php 

//lets add configuraiton 
require("../config.php");

// check if user is logged in or not
require("verify-user.php");

// Lets select data from the category table..
$category_resultset = $conn->query("SELECT p.id, c.category_name, product_name,product_descp,cover_image  FROM product as p INNER JOIN category as c ON p.category_id = c.id");

require("header.php"); ?>
<div class="content-area">
                    <div class="inner-main">
                    <h2>Manage Product</h2>
                    <?php if (isset($_GET['success'])) { 
                        echo  "<p class='success'>" . $_GET['success'] . "</p>"; 
                    } ?>

                    <?php if (isset($_GET['error'])) { 
                        echo  "<p class='error'>" . $_GET['error'] . "</p>"; 
                    } ?>

                    <div><a href="add-category.php" class="btn">Add Product</a></div>
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
                                    <td><?php echo $row['product_name']; ?></td>
                                    
                                    <td><a href="<?php echo $upload_dir . $row['cover_image']; ?>" target="_BLANK" ><img class="img-normal" src="<?php echo $upload_dir . $row['cover_image']; ?>" /></a></td>
                                    <td> <a href="update-crop.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green;"></i></a>&nbsp;<a href="delete-crop.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></a></td>
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
