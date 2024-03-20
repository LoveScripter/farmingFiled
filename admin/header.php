<!DOCTYPE html>
<html lang="en">

<head>
    <!-- include script.js -->
    <script src="js/script.js"></script>
    <script src="js/tiny.min.js"></script>
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
        .content-area{
        color:whitesmoke;
        background:rgba(0, 0, 0, 0.729);
        }
    </style>
</head>

<body>
    <!-- outer div..-->
    <div class="">
        <!-- lets create the header and sidebar..-->

        <div class="row full-area">

            <div class="sidebar" style="background:rgba(0, 0, 0, 0.938); ">
                <h2>Farming Field</h2>

                <ul class="outer-sidebar">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href=""> Category</a><i onclick="dropdown(event);" class="fa fa-caret-right"></i>
                        <ul class="inner-sidebar">
                            <li><a href="add-category.php">Add Category</a></li>
                            <li><a href="list-category.php">List Category</a></li>

                        </ul>

                    </li>
                    <li><a href=""> Crop Item</a><i onclick="dropdown(event);" class="fa fa-caret-right"></i>
                        <ul class="inner-sidebar">
                            <li><a href="add-crop.php">Add Crop</a></li>
                            <li><a href="list-crop.php">List Crop</a></li>

                        </ul>

                    </li>
                    <li><a href=""> Blog</a><i onclick="dropdown(event);" class="fa fa-caret-right"></i>
                        <ul class="inner-sidebar">
                            <li><a href="add-blog.php">Add Blog</a></li>
                            <li><a href="list-blog.php">List Blog</a></li>

                        </ul>

                    </li>


                    <li><a href="">pages</a><i onclick="dropdown(event);" class="fa fa-caret-right"></i>
                        <ul class="inner-sidebar">
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="">Our Services</a></li>

                        </ul>
                    </li>
                    <li><a href="settings.php">Settings</a></li>

                </ul>

                <div class="center logout">
                    <a href="logout.php">Logout</a>

                </div>
            </div>