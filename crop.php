<?php 
// config
require("config.php");

if (!isset($_GET['category_id'])) {
    die("No category Is passed");
}


$category_id = $_GET['category_id'];


if (!is_numeric($category_id)) {
    die("No category Is passed");
}




// query to pull from products..
$sql = "SELECT * FROM product WHERE category_id=" . $category_id;
$product_result = $conn->query($sql);


// query to pull from category table
$sql = "SELECT * FROM category WHERE  id=" . $category_id;
$category_result = $conn->query($sql);
$category = $category_result->fetch_assoc();


$product_id = isset($_GET['product_id'])?$_GET['product_id']:'';


// if product id is blank get first product.
if (empty($product_id)) {
    $product_detail = $product_result->fetch_assoc();
} else {
    $sql = "SELECT * FROM product WHERE id=" . $product_id;
    $product_res = $conn->query($sql);
    $product_detail = $product_res->fetch_assoc();
}

// go back to first row.
$product_result->data_seek(0);



$home_header_bg = "crop-header-bg";
require("header.php");
?>
<style>
    .inner-nav ul {
        display: block;
    }

    .inner-nav ul li {
        display: block;
    }

    .link-3 {
        transition: 0.1s;
        font-size: 20px;
        text-decoration: none;

    }

    .link-3:hover {
        padding: 10px 10px;
    }

    @media only screen and (max-width:1200px) {
        .sidebar {
            width: 42%;
            display: flow;
            margin-left: -21px;
        }

        .main-area {
            width: 70%;
            margin-left: -21px;
        }
    }
</style>

<div class="content-area">
    <div class="row">
        <div class="sidebar" style="width:30%">
            <ul>
                <li class=" link-3">
                    <h2 style="background: linear-gradient(60deg,yellowgreen,orange);">
                        <?php echo $category['category_name']; ?>
                    </h2>
                </li>

                <?php while($row = $product_result->fetch_assoc()) { 
                    $active_sidebar = ($product_detail['id'] == $row['id'])?'active-sidebar':'';    
                    ?>
                <li class=" link-3"><a style="background:linear-gradient(45deg,yellowgreen,green); color:black;"
                        class="<?php echo $active_sidebar; ?>"
                        href="crop.php?category_id=<?php echo $_GET['category_id']; ?>&product_id=<?php echo $row['id']; ?>">
                        <?php echo $row['product_name']; ?>
                    </a></li>

                <?php } ?>


            </ul>
        </div>
        <div class="main-area" style="width:70%;">


            <?php  
                        if (!isset($_GET['product_id'])) { ?>

            <h1 style="margin-top:0">
                <?php echo isset($category['category_name'])?$category['category_name']:''; ?>
            </h1>
            <div>
                <img style="min-width:0;min-height:0;height:300px;"
                    src="uploads/<?php echo isset($category['category_image'])?$category['category_image']:''; ?>">
            </div>
            <p>
                <?php echo isset($category['category_descp'])?$category['category_descp']:''; ?>
            </p>


            <?php } else { ?>
            <h1 style="margin-top:0">
                <?php echo isset($product_detail['product_name'])?$product_detail['product_name']:''; ?>
            </h1>
            <div>
                <img style="min-width:0;min-height:0;height:300px;"
                    src="uploads/<?php echo isset($product_detail['cover_image'])?$product_detail['cover_image']:''; ?>">
            </div>
            <p>
                <?php echo isset($product_detail['product_descp'])?$product_detail['product_descp']:''; ?>
            </p>

            <?php } ?>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>