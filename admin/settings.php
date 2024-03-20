<?php 
//lets add configuraiton 
require("../config.php");

// check if user is logged in or not
require("verify-user.php");

require("header.php"); ?>
<div class="content-area">
                <div class="inner-main">
                    <h2>Settings</h2>
                    
                    <div>

                        <a class="tab">Logo</a>
                        <a class="tab">Footer</a>

                    </div>    

                    </div>
                </div>
<?php require("footer.php"); ?>