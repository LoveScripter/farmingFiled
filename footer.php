<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<footer>

<div class="row footer">
    <div class="col-4 left info" style="padding-left:30px; line-height: 2.15;">
      <h2>Contact Information</h2>
      <ul class="links">
        <li><i class="fa fa-map-marker" aria-hidden="true" style="color:black"></i>&nbsp;  </i>Near Syndicate Bank,Raduar,Ymunanagar,Haryana,135133</li>
        <li><i class="fa fa-phone" aria-hidden="true" style="color:black">&nbsp;  </i>Phone no. 6396376753</li>
        <li><i  class="fa fa-envelope-o"  aria-hidden="true" style="color:black">&nbsp;
        </i>Email rr1150650@gmail.com </li>
        
      </ul>  
    </div>
    <div class="col-4 center">
        <h2 class="h2-links">Quick links</h2>
        <ul class="ul-links">
            <li ><a href="index.php" style="color:white">Home</a></li>
            <li><a href="about.php" style="color:white">About Us</a></li>
            <li><a href="blog.php" style="color:white">Blog</a></li>
            <li><a href="#" style="color:white">Crop</a></li>
            <li><a href="contact.php" style="color:white">Contact Us</a></li>
        </ul>  
      </div>
      <div class="col-4 center">
        <h2 class="h2-links">Keep Connected</h2>
        <ul class="ul-links">
            <li><a href="https://www.facebook.com/profile.php?id=100027543330517&mibextid=ZbWKwL" style="color:white">Facebook</a></li>
            <li><a href=""style="color:white">Twitter</a></li>
            <li><a href="https://wa.me/+916396376753" style="color:white">Whattsapp</a></li>
            <li><a href="rr1150650@gmail.com" style="color:white">E-mail</a></li>
            <li><a href="https://www.instagram.com/love_rajput__001/" style="color:white">Instagram</a></li>
            
        </ul>  
      </div>
      <div class="col-4 center">
        <h2 class="h2-links">Our best blogs</h2>
        <ul class="blog-links">
            <?php while ($row=$blog_result->fetch_assoc()) { ?>
            <li><a href="blog-detail.php?id=<?php echo $row['id']; ?>" style="color:white"><?php echo $row['blog_name']; ?></a></li>
            <?php } ?>
        </ul>
      </div>
</div>
</footer>


</div>

</body>
</html>