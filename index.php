<?php

require_once "etc/config.php";



try {
    $navInterview = Story::findByRandomCategory(3, 1);
    $navReview = Story::findByRandomCategory(1, 1);
    $navFeature = Story::findByRandomCategory(4, 1);
    $navNews = Story::findByRandomCategory(2, 1);
    $newsPanel01 = Story::findByRandomCategory(3, 1);
    $newsPanel02 = Story::findByRandomCategory(2, 1, 1);
    $landscapeReview = Story::findByCategory(1, 2);
    $smallReview01 = Story::findByRandomCategory(1, 2, 3);
    $smallReview02 = Story::findByRandomCategory(1, 2, 8);
    $smallFeatures = Story::orderByDate(3, 4);
    $largeFeatures = Story::findByRandomCategory(4, 1);
    $reviewPanel00 = Story::orderByDate(1, 4);
    $reviewPanel01 = Story::orderByDate(1, 1, 4);
    $reviewPanel02 = Story::orderByDate(1, 1, 5);
    $reviewPanel03 = Story::orderByDate(1, 4, 6);
    $logoReview = Story::findByRandomCategory(1,1);
}
catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/latest.css">
    <link rel="stylesheet" href="css/review_styles.css">
    <link rel="stylesheet" href="css/feature_styles.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/footer_styles.css">

    <title>Best New Records</title>

</head>

<header>
        <div class="container">
            <div class="width-12">
                <div class="logo">
                    <h1>BEST</h1>
                    <a href="index.php">
                    <img src="images/Logos/HeaderLogo.svg">
                    </a>
                    <h1>RECORDS</h1>
                </div>
            </div>
        </div>

        <div class="containerFull">
            <hr>
            <div class="categories container">
                <div class="width-12">
                    <ul>
                    <?php
            foreach ($navInterview as $story) {?>
                    <?php $category = Category::findById($story->category_id); ?>
                        <li><a href="featurearticle.php?id=<?= $story->id ?>">INTERVIEWS</a></li>
                        <?php } ?>
                        <?php foreach ($navReview as $story) {?>
                    <?php $category = Category::findById($story->category_id); ?>
                        <li class="redNavBar" style="color: red;"><a href="article.php?id=<?= $story->id ?>">REVIEWS</a></li>
                        <?php } ?>
                        <?php foreach ($navNews as $story) {?>
                    <?php $category = Category::findById($story->category_id); ?>
                        <li><a href="featurearticle.php?id=<?= $story->id ?>">NEWS</a></li>
                        <?php } ?>
                        <?php foreach ($navFeature as $story) {?>
                    <?php $category = Category::findById($story->category_id); ?>
                        <li><a href="featurearticle.php?id=<?= $story->id ?>">FEATURES</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

</header>

<body>

    <!-- Latest Section -->

    <section class="latest">
        <div class="container">

            <div class="headingLine width-7">
                <h1>MUSIC NEWS</h1>
            </div>
            <div class="headingLine width-5">
                <h1>REVIEWS</h1>
            </div>






            <?php
            foreach ($newsPanel01 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="latestPanel width-6">
            <a href="featurearticle.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h2><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h2>
                <p>by <span style="color: red;"><?= $story->author?></span></p>
                <?php $date = new DateTime($story->date_posted); $result = $date->format('jS M, Y'); ?>
                <p><?= $result ?></p>
            </div>
            <?php } ?>

            <div class="width-1 vl"></div>


            <div class="landscapeReview width-5 ">
                <?php
            foreach ($landscapeReview as $story) {?>
                <?php $category = Category::findById($story->category_id); ?>

                <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <div class="landscapeReviewTxt">
                    <h3><?= $story->headline ?></h3>
                    <h4><a href="article.php?id=<?= $story->id ?>"><?= $story->artist ?></a></h4>
                    <p><?= $story->subheading ?></p>
                    <p style="font-size: 14px; line-height: 0px;">
                        by <span style="color: red;"><?= $story->author ?></span>
                    </p>
                </div>
                <?php } ?>
            </div>


            <?php
            foreach ($newsPanel02 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="latestPanel width-6">
            <a href="featurearticle.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h2><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h2>
                <p>by <span style="color: red;"><?= $story->author?></span></p>
                <?php $date = new DateTime($story->date_posted); $result = $date->format('jS M, Y'); ?>
                <p><?= $result ?></p>
            </div>
            <?php } ?>

            <div class="width-1"></div> 
           
            <div class="smallReview smallReview01 width-2">
            <?php  
            foreach ($smallReview01 as $story) {?>
                <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
                <?php } ?>                
            </div>

            <div class="width-1"></div>

            <div class="smallReview smallReview02 width-2">
           <?php
            foreach ($smallReview02 as $story) {?>
                <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
                <?php } ?>                
            </div>
            
          
               
            
          
        </div>

    </section>

    <!-- Reviews -->

    <section class="reviews">

        <div class="container">

            <div class="width-12 headingLine">
                <h1>REVIEWS</h1>
            </div>

            <?php
        foreach ($reviewPanel00 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-3">
            <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>



            <?php
        foreach ($reviewPanel01 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-3">
            <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>

            <div class="width-1"></div>

            <?php
        foreach ($logoReview as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-4">
                <a href="article.php?id=<?= $story->id ?>">
                <svg width="379" height="380" viewBox="0 0 353 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="353" height="353" fill="#FF3530" />
                    <path d="M353 199.581L150.704 4.19194e-05L353 5.96046e-05L353 199.581Z" fill="#f8faf1" />
                    <path d="M339.423 160.208L187.361 13.577L339.423 13.577L339.423 160.208Z" fill="#FF3530" />
                    <path
                        d="M91.9585 143.997L100.585 135.371L112.323 147.109C114.492 149.277 116.825 150.338 119.324 150.291C121.822 150.243 123.99 149.301 125.829 147.462C127.102 146.189 127.95 144.775 128.374 143.22C128.799 141.664 128.775 140.085 128.304 138.482C127.88 136.926 126.937 135.418 125.475 133.956L113.737 122.218L122.152 113.804L132.971 124.623C134.809 126.461 136.742 127.498 138.769 127.734C140.843 127.922 142.823 127.074 144.709 125.188C146.547 123.35 147.349 121.417 147.113 119.39C146.924 117.316 145.911 115.36 144.072 113.521L133.254 102.702L141.88 94.0756L154.82 107.016C158.026 110.221 160.147 113.521 161.184 116.915C162.268 120.356 162.41 123.656 161.608 126.815C160.807 129.973 159.204 132.754 156.8 135.159C153.736 138.223 150.153 139.825 146.052 139.967C141.951 140.108 137.567 138.647 132.9 135.583L136.93 132.118C140.325 137.115 141.927 141.97 141.739 146.684C141.597 151.446 139.735 155.617 136.153 159.2C133.419 161.934 130.26 163.726 126.677 164.574C123.189 165.423 119.536 165.211 115.717 163.938C111.946 162.712 108.293 160.332 104.757 156.796L91.9585 143.997ZM83.4732 135.512L133.395 85.5903L144.355 96.5505L94.4334 146.472L83.4732 135.512ZM128.772 180.811L178.694 130.889L186.472 138.668L179.825 151.961L139.874 191.913L128.772 180.811ZM163.208 215.247L171.481 148.143L186.472 138.668L178.199 205.772L163.208 215.247ZM163.208 215.247L170.209 202.307L210.16 162.356L221.262 173.457L171.34 223.379L163.208 215.247ZM210.039 220.924L218.241 212.722L228.777 223.257C230.993 225.473 233.255 226.604 235.565 226.652C237.922 226.746 240.067 225.827 242 223.894C243.791 222.102 244.687 220.028 244.687 217.671C244.687 215.314 243.579 213.028 241.364 210.812L230.757 200.206L239.384 191.579L251.263 203.458C254.563 206.758 256.826 210.294 258.051 214.065C259.324 217.789 259.56 221.466 258.758 225.096C257.957 228.726 256.118 231.978 253.243 234.854C250.32 237.777 247.044 239.639 243.414 240.44C239.831 241.194 236.154 240.912 232.383 239.592C228.612 238.272 225.006 235.891 221.565 232.45L210.039 220.924ZM180.977 233.015L230.898 183.094L242 194.195L192.078 244.117L180.977 233.015ZM208.129 260.168L214.069 223.116L227.009 230.541L221.282 273.321L208.129 260.168Z"
                        fill="#f8faf1" />
                </svg>
                </a>
            </div>
            <?php } ?>

            <div class="width-1"></div>

            <?php
        foreach ($reviewPanel02 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-3">
            <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>

            <?php
            foreach ($reviewPanel03 as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-3">
            <a href="article.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
                <h4><?= $story->artist ?></h4>
                <h3><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h3>
                <p style="padding-bottom: 10px">by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>


        </div>

    </section>

    <!-- Features -->

    <section class="features">

        <div class="container">

            <div class="width-12 headingLine">
                <h1>FEATURES</h1>
            </div>


            <?php
        foreach ($largeFeatures as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="wideFeaturePanel width-7">
            <a href="featurearticle.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
            </div>
            <div class="largeFeatureTxt width-5">
                <h2><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h2>
                <h3><?= $story->subheading ?></h3>
                <p>by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>

            <!-- <div class="smallFeature"> -->
            <?php
        foreach ($smallFeatures as $story) {?>
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-3">
            <a href="featurearticle.php?id=<?= $story->id ?>"><img src="<?= $story->image_location ?>" /></a>
            </div>
            <div class="smallFeatureTxt width-3">
                <h4><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h4>
                <h5><?= $story->subheading ?></h5>
                <p>by <span style="color: red;"><?= $story->author ?></span></p>
            </div>
            <?php } ?>


        </div>
    </section>

    <footer>
    
    <div class="mailingList">
        <div class="container">
    
            <div class="signUp width-6">
                <h2>SIGN UP TO BEST NEW RECORDS MAILING LIST</h2>
                <p>Sign up for exclusive early article access</p>
            </div>
    
            <div class="searchBox width-4">
                <h4>EMAIL ADDRESS</h4>
                <input type="text">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    viewBox="0 0 16 16">
                    <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                        <g fill="#1A1A1A" transform="translate(-144 -314)">
                            <g fill="#1A1A1A">
                                <g fill="#1A1A1A">
                                    <g transform="translate(0 56)" fill="#1A1A1A">
                                        <g transform="translate(144 258)" fill="#1A1A1A">
                                            <g fill="#1A1A1A">
                                                <g fill="#1A1A1A">
                                                    <path
                                                        d="M7.997.005c-2.172 0-2.444.01-3.297.048C3.85.092 3.268.227 2.76.425a3.92 3.92 0 00-1.417.922A3.92 3.92 0 00.42 2.764c-.198.509-.333 1.09-.372 1.941C.01 5.558 0 5.831 0 8.003s.01 2.444.048 3.297c.039.851.174 1.432.372 1.941.204.526.478.972.922 1.417.445.444.89.718 1.417.922.509.198 1.09.333 1.941.372.853.039 1.125.048 3.297.048s2.445-.01 3.298-.048c.851-.039 1.432-.174 1.941-.372a3.92 3.92 0 001.417-.922 3.92 3.92 0 00.922-1.417c.198-.509.333-1.09.372-1.941.039-.853.048-1.125.048-3.297s-.01-2.445-.048-3.298c-.039-.851-.174-1.432-.372-1.941a3.92 3.92 0 00-.922-1.417 3.92 3.92 0 00-1.417-.922c-.509-.198-1.09-.333-1.941-.372-.853-.039-1.126-.048-3.298-.048zm0 1.441c2.136 0 2.389.008 3.232.047.78.035 1.203.166 1.485.275.373.145.64.318.92.598.28.28.453.547.598.92.11.282.24.705.275 1.485.039.843.047 1.096.047 3.232 0 2.135-.008 2.388-.047 3.231-.035.78-.166 1.203-.275 1.485-.145.374-.318.64-.598.92-.28.28-.547.453-.92.598-.282.11-.705.24-1.485.275-.843.039-1.096.047-3.232.047-2.135 0-2.388-.008-3.231-.047-.78-.035-1.203-.165-1.485-.275a2.478 2.478 0 01-.92-.598 2.478 2.478 0 01-.598-.92c-.11-.282-.24-.705-.275-1.485-.039-.843-.047-1.096-.047-3.231 0-2.136.008-2.389.047-3.232.035-.78.165-1.203.275-1.485.145-.373.318-.64.598-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.275.843-.039 1.096-.047 3.231-.047z"
                                                        fill="#1A1A1A"></path>
                                                    <path
                                                        d="M7.997 10.668a2.666 2.666 0 110-5.331 2.666 2.666 0 010 5.331zm0-6.772a4.107 4.107 0 100 8.213 4.107 4.107 0 000-8.213z"
                                                        fill="#1A1A1A"></path>
                                                    <path d="M13.226 3.733a.96.96 0 11-1.92 0 .96.96 0 011.92 0"
                                                        fill="#1A1A1A"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="17" height="16"
                    viewBox="0 0 17 16">
                    <g fill-rule="evenodd" stroke="none" stroke-width="1" fill="#1A1A1A">
                        <g transform="translate(-184 -314)" fill="#1A1A1A">
                            <g fill="#1A1A1A">
                                <g fill="#1A1A1A">
                                    <g transform="translate(0 56)" fill="#1A1A1A">
                                        <g transform="translate(144 258)" fill="#1A1A1A">
                                            <g transform="translate(40)" fill="#1A1A1A">
                                                <path
                                                    d="M16.166.296A6.226 6.226 0 0114 1.275C13.379.49 12.49 0 11.509 0 9.629 0 8.1 1.809 8.1 4.039c0 .317.03.624.088.92C5.353 4.79 2.84 3.184 1.158.738A4.614 4.614 0 00.695 2.77c0 1.4.601 2.638 1.517 3.362a3.02 3.02 0 01-1.546-.504v.05c0 1.958 1.176 3.59 2.738 3.96a2.86 2.86 0 01-.9.142c-.219 0-.433-.024-.641-.071.434 1.604 1.693 2.772 3.186 2.803-1.167 1.084-2.639 1.73-4.236 1.73A5.93 5.93 0 010 14.187C1.51 15.33 3.303 16 5.229 16c6.274 0 9.704-6.154 9.704-11.491 0-.176-.003-.352-.009-.524a7.735 7.735 0 001.701-2.09 5.983 5.983 0 01-1.958.635c.704-.5 1.245-1.291 1.5-2.234"
                                                    fill="#1A1A1A"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="7" height="16"
                    viewBox="0 0 7 16">
                    <g fill-rule="evenodd" stroke="none" stroke-width="1" fill="#1A1A1A">
                        <g transform="translate(-225 -314)" fill="#1A1A1A">
                            <g fill="#1A1A1A">
                                <g fill="#1A1A1A">
                                    <g transform="translate(0 56)" fill="#1A1A1A">
                                        <g transform="translate(144 258)" fill="#1A1A1A">
                                            <g transform="translate(81)" fill="#1A1A1A">
                                                <path
                                                    d="M4.548 16V8h2.024l.268-2.758H4.548l.004-1.38c0-.72.062-1.105 1.009-1.105h1.265V0H4.802C2.37 0 1.515 1.338 1.515 3.587v1.655H0V8h1.515V16h3.033z"
                                                    fill="#1A1A1A"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="searchButton width-2">
                <a href="#">SIGN UP</a>
            </div>
        </div>
        <hr />
        <div class="footerLists container">
    
            <div class="footerBlock width-3">
                <h3>ABOUT</h3>
                <ul>
                    <li><a href="#">Our Purpose</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Stores</a></li>
                </ul>
            </div>
    
            <!-- <div class="footerBlock width-3">
                <h3></h3>
                <ul>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Payment</a></li>
                    <li><a href="#">Your Order</a></li>
                </ul>
            </div> -->
    
            <div class="footerBlock width-3">
                <h3>CONTACT US</h3>
                <ul>
                    <li><a href="#">+44 (0)333 323 7728</a></li>
                    <li><a href="#">Email Us</a></li>
                </ul>
            </div>
    
           
    
        </div>

        <div class="bottomOfFooter container">
            <div class="logo width-1">
                <img src="images/Logos/MainLogo.svg" />
            </div>
            <div class="policies width-6">
                <a href="#">Terms and Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Other Policies</a>
            </div>

           
            
        </div>
        

    </div>
</footer>

</body>

</html>