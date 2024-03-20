<?php 

// add database file..
require('config.php');

$blog_id = $_GET['id'];

//query..
$sql = "SELECT * FROM blog WHERE id=" . $blog_id;

$result = $conn->query($sql);

$blog = $result->fetch_assoc();
$home_header_bg = "blog-header-bg";
require("header.php");

?>

            <main>

                <div class="row blog-detail-head">
                    <div class="col">
                        <h2><?php echo $blog['blog_name']; ?></h2>
                    </div>
                </div> 
                <div class="row blog-detail" style="padding-top:14px">
                    <div class="col" style="box-shadow: 2px 2px 4px black;
    padding: 32px;
    border-radius: 12px;padding-right:32px">
                        <img style="border-radius:12px;min-height:0;min-width:0;height:300px;float:left;margin-right: 32px;" src="uploads/<?php echo $blog['blog_image']; ?>">

                        

                        
                  
                    
                    <?php echo $blog['blog_text']; ?>
                    </div>
                </div>


            </main>
<?php 

require("footer.php");


?>