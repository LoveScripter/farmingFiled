<?php

require("config.php");
$sql= "SELECT page_text FROM pages WHERE page_name='aboutus'";
$result=$conn->query($sql);
$home_header_bg ="contact-header-bg";
require("header.php");    
?>  
<!DOCTYPE html>
     <html>
    <head>
        <title>Farming Field</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!-- lets add two style files-->
        <link href="css/normalize.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background:linear-gradient(45deg,orange,black,green,transparent);
            }
                  nav ul li a {
                text-decoration:none;
                padding-left:20px;
                color:white;
            }
            ul li a {
                font-family: "Barlow Condensed";
                font-size:20px;
            }

            main {
                padding-left: 20px;
                padding-right: 20px;
                margin-top: 20px;
            }
            .top-bar li  {
                display:inline-block;
            }
            .menu-row {
                padding:20px 12px;
            }
            footer {
                
                background: linear-gradient(45deg, #357523, #d5a6a6);
                padding: 32px;
                color: white;
                line-height: 24px;
                margin-top:30px;

            }
            footer h2 {
                margin-bottom:20px;
                color:black;
            }
          </style>
    </head>
    <body>
    <div> 
        <?php while($row=$result->fetch_assoc()) { ?> 
            <div class="row">
                    
              <div class="col">
                <h2 style="text-align: center; padding-top:20px; padding-bottom:20px;font-size: xx-large; color:white;">About us</h2>
                  <div class="para" style="width: 80%;margin: 0 auto;text-align: justify;padding: 48px;background: linear-gradient(45deg, black, transparent);color: snow;border-radius: 8px;padding: 33px;line-height: 32px;"><?php echo $row['page_text']; ?></div>
              </div> 
          </div>
          <?php } ?>
        </div>
          <?php require("footer.php"); ?>
  </body>
</html>