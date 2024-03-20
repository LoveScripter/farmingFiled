<?php 

// add database file..
require('config.php');

$where = "";

if (count($_POST)>0) {
  $where = " WHERE blog_name like '%" .  $_POST['search'] . "%'";
}
//query..
$sql = "SELECT * FROM blog $where";

$result = $conn->query($sql);

$sql = "SELECT * FROM blog";

$result_set = $conn->query($sql);




$home_header_bg = "blog-header-bg";
require("header.php");
?>

            <main>

              <div class="row">
                <div style="width:70%" class="blog-area">
                <?php while($row=$result->fetch_assoc()) { ?>
                  <div>
                    <h2><?php echo $row['blog_name']; ?></h2>
                    <div class="blog-img">
                      <img src="uploads/<?php echo $row['blog_image']; ?>" />
                    </div>
                    <p>
                  
                    <?php 
                    echo (strlen($row['blog_text']) > 300) ? substr($row['blog_text'],0,300).'...' : $row['blog_text'];

                    ?>
                   </p>
                    <div class="blog-btn">
                      <?php if (strlen($row['blog_text']) > 300) { ?>
                      <a href="blog-detail.php?id=<?php echo $row['id']; ?>">Read More</a>
                      <?php } ?>
                    </div>
                  </div>

                  <?php } ?>
                </div>
                <div style="width:30%" class="right-sidebar">
                  <h2 class="center">Popular Blog Links</h2>
                  <ul>
                  <?php 

                  while ($row=$result_set->fetch_assoc()) { 
                    
                    
                    ?>

                  

                    <li><a href=""><?php echo $row['blog_name']; ?></a></li>

                  <?php } ?>
                  
                  </ul>

                </div>
              </div>
              <action>


        </main>
<?php 
require("footer.php");
?>