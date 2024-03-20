<?php 
//select blogs 
$sql = "SELECT * FROM blog LIMIT 0,5";

$blog_result = $conn->query($sql);


// 
$sql = "SELECT * FROM category";

$category_menu = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <!-- lets add two style files-->
    <link href="css/normalize.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel='stylesheet' id='serity-google-fonts-css'
        href='//fonts.googleapis.com/css?family=Arimo%3A400%2C400i%2C700%2C700i%7CBarlow+Condensed%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i%7CMontserrat%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;display=swap&#038;ver=5.4.13'
        media='all'/>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500&display=swap" rel="stylesheet">
   
    <style>
        .inner-nav ul {
            display: block;
        }

        .inner-nav ul li {
            display: block;
        }

        .link-3 {
            transition: 0.4s;
            color: #ffffff;
            font-size: 20px;
            text-decoration: none;
            padding: 0 10px;
            margin: 0 10px;
        }

        .link-3:hover {
            background-color: #ffffff;
            color: #EEA200;
            padding: 10px 10px;
        }
    </style>
</head>

<body>

    <div>


        <section id="<?php echo $home_header_bg; ?>">


            <header>
            
                <div class="row menu-row">
                    <img class="hamburger" width="23" src="images/hamburger.svg" alt="">
                    
                    <div class="logo">
                        <div class="col-3 logo" style="width:100%;">
                            <a href="index.php"> <img class="img logo" style="min-width:0;min-height:0;" height="70px"
                                    width="150px"
                                    src="https://api.logo.com/api/v2/images?logo=logo_b59c068c-5967-4d32-8fee-2be6a21edb0f&format=webp&margins=0&quality=60&width=500&background=transparent&u=1693915403"></a>
                        </div>
                    </div>
                 
                        <div class="col-3 right">
                            <nav class="shift  navbar">
                               
                                <ul class="outerNav navlist">
                                    <img class="close" width="23" src="images/close.svg" alt="">
                                    <li><a class="link-3" href="index.php">Home</a></li>
                                    <li><a class="link-3" href="about.php">About us</a></li>
                                    <li class="crop-ul">
                                        <a class="link-3" href="#">Crop</a>
                                        <ul class="innerNav navlist">
                                            <?php while ($row=$category_menu->fetch_assoc()) { ?>
                                                
                                                <li><a class="link-3" href="crop.php?category_id=<?php echo $row['id']; ?>">
                                                    <?php echo $row['category_name']; ?>
                                                </a></li>
                                                
                                                <?php } ?>
                                                
                                                
                                            </ul>
                                        </li>
                                        <li><a class="link-3" href="blog.php">Blog</a></li>
                                        <li><a class="link-3" href="contact.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-3 search">
                                
                                <form class="search" action="blog.php" method="POST"><input type="text" name="search"
                                value="<?php echo (isset($_POST['search'])?$_POST['search']:''); ?>"
                                placeholder="Search..."
                                style="position:absolute;margin-top: 18px;margin-left: 119px; padding-right:92px; border-radius:10px;">
                                <i class="fa fa-search"
                                style="color:black; position: relative;margin-left:363px;padding-top: 21px;"></i>
                            </form>
                        </div>
             
                    </div>
                    


            </header>


        </section>
        <script src="js/script.js"></script>
    </body>
    </html>