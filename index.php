<?php 
// config
require("config.php");

// pick all categories..
$category = $conn->query("SELECT * FROM category");

// Lets build up array from unique page.
while ($row=$category->fetch_assoc()) {
    $category_data[$row['unique_name']] = $row; 
}

$home_header_bg = "home-header-bg";
require("header.php");
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<main>
    <div class="row heading">
        <div class="col center">
            <h1>We guide you</h1>
        </div>
    </div>
    <div class="row crop-info" style="flex-wrap:wrap;">
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Types of crop</h2>
            <p> We provide you information about the types of crop.</p>

        </div>
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Seed and Grow Crop</h2>
            <p> We provide you information about seeds of crop.</p>

        </div>
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Prevent Crop from fungus</h2>
            <p> We provide you information to prevent crop from fungus.</p>

        </div>
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Crop Storage</h2>
            <p> We provide you information about how and where to store .</p>

        </div>
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Varieties of Crop</h2>
            <p> We provide you information about the Varieties.</p>

        </div>
        <div>
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <h2>Sell your crop</h2>
            <p> We provide you information about where is the best site to sell and by the crop.</p>

        </div>
    </div>
    <div class="row single-crop cropInfo" style="
            margin-top: 66px;
        ">
        <div class="col-2" style="text-align: center;
                position: relative;
                padding: 32px;
                box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.05);">
            <img style="border-radius: 50%;
                    object-fit: 20%;
                    /* width: 266px; */
                    /* height: 200px; */
                    border: 2px solid #41c44b;"
                src="uploads/<?php echo $category_data['kherif']['category_image']; ?>" />
        </div>
        <div class="col-2" style="box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.05);
                padding: 22px;
                text-align: justify;">
            <h2>What is Kherif Crop?</h2>
            <p style="padding-left: 15px;
                    line-height: 26px;">

                <?php 
                    
                    echo (strlen($category_data['kherif']['category_descp']) > 800) ? substr($category_data['kherif']['category_descp'],0,800).'...' :$category_data['kherif']['category_descp'];
                    
                    ?>

                <a href="crop.php?category_id=<?php echo $category_data['kherif']['id']; ?>">Read more</a>


            </p>
        </div>
    </div>

    <div class="row single-crop crop-Info" style="
            margin-top: 66px;
        ">
        <div class="col-2" style="box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.05);
                        padding: 22px;
                        text-align: justify;">
            <h2>What is Rabi Crop?</h2>
            <p style="padding-right: 15px;
                            line-height: 26px;">
                <?php 
                               echo (strlen($category_data['rabi']['category_descp']) > 400) ? substr($category_data['rabi']['category_descp'],0,1000).'...' :$category_data['rabi']['category_descp'];
                            ?>

            </p>
            <a href="crop.php?category_id=<?php echo $category_data['rabi']['id']; ?>">Read more</a>
        </div>
        <div class="col-2" style="text-align: center;
                position: relative;
                padding: 32px; box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.05);">
            <img class="image"  style="border-radius: 50%;
                    object-fit: 20%;
                    /* width: 266px; */
                    /* height: 200px; */
                    border: 2px solid #41c44b;" src="uploads/<?php echo $category_data['rabi']['category_image']; ?>">
        </div>

    </div>


    <div class="row single-crop cropInfo" style="
            margin-top: 66px;
        ">
        <div class="col-2" style="text-align: center;
                position: relative;
                padding: 32px;
              
          
                box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.05);">
            <img style="border-radius: 50%;
                    object-fit: 20%;
                    /* width: 266px; */
                    /* height: 200px; */
                    border: 2px solid #41c44b;"
                src="uploads/<?php echo $category_data['zaid']['category_image']; ?>" />
        </div>
        <div class="col-2" style="box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.05);
                padding: 22px;
                text-align: justify;">
            <h2>What is Zaid Crop?</h2>
            <p style="padding-left: 15px;
                    line-height: 26px;">

                <?php 
                       echo (strlen($category_data['zaid']['category_descp']) > 400) ? substr($category_data['zaid']['category_descp'],0,1000).'...' :$category_data['zaid']['category_descp'];
                    ?>

                <a href="crop.php?category_id=<?php echo $category_data['zaid']['id']; ?>">Read more</a>


            </p>

        </div>

    </div>
</div>


    <div class="row heading" style="margin-top:32px;">

        <div class="col center">
            <h2>How to Prevent your Crop Damage?</h2>
        </div>

    </div>

    <div class="row box-gutter tips">

        <div class="col-2 " style="border:2px;box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.065); border-radius:20px;">

            <h2 style="background:linear-gradient(256deg, #40922c, #a66767); border-radius: 20px;height: 50px;">
                Fertilizer</h2>
            <p class="justify" style="line-height: 2.15; text-align: justify; padding-left:10px; padding-right:10px;">A
                fertilizer (American English) or fertiliser (British English) is any material of natural or synthetic
                origin that is applied to soil or to plant tissues to supply plant nutrients. Fertilizers may be
                distinct from liming materials or other non-nutrient soil amendments. Many sources of fertilizer exist,
                both natural and industrially produced.[1] For most modern agricultural practices, fertilization focuses
                on three main macro nutrients: nitrogen (N), phosphorus (P), and potassium (K) with occasional addition
                of supplements like rock flour for micronutrients</p>
        </div>

        <div class="col-2 center "
            style="border:2px;box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.065); border-radius:20px;">

            <h2 style="background:linear-gradient(256deg, #40922c, #a66767); border-radius: 20px;height: 50px;">
                Pesticides</h2>
            <p class="justify " style="line-height: 2.15; text-align: justify; padding-left:10px; padding-right:10px;">
                A Pesticide (American English) or Pesticides (British English) is any material of natural or synthetic
                origin that is applied to soil or to plant tissues to supply plant nutrients. Fertilizers may be
                distinct from liming materials or other non-nutrient soil amendments. Many sources of fertilizer exist,
                both natural and industrially produced.[1] For most modern agricultural practices, fertilization focuses
                on three main macro nutrients: nitrogen (N), phosphorus (P), and potassium (K) with occasional addition
                of supplements like rock flour for micronutrients</p>
        </div>
    </div>

    <script type="text/javascript">

        var slider_images = [
            'B5SyYcl-tractor-wallpaper.jpg',
            'E.jpg',
            'rapeseeds-4910374_1280.jpg',
            'background.jpg',
            'onion-3540502_1280.jpg',
            'strawberries-1396330_1280.jpg'
        ];

        var index = 0;
        var head_elem = document.getElementById("home-header-bg");

        setInterval(() => {

            // lets change the images..

            head_elem.style.backgroundImage = "url('images/" + slider_images[index] + "')";


            if (index == 5) {
                index = -1;
            }

            index = index + 1;

        }, 2000);


    </script>
</main>


<?php require("footer.php"); ?>