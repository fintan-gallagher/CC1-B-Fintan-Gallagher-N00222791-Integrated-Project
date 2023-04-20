<?php
require "etc/config.php";
try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception ("Invalid request method");
    }
    if (!array_key_exists('id', $_GET)) {
        throw new Exception("Invalid request--missing id");
    }
    $id = $_GET['id'];
    $story = Story::findById($id);
    if ($story === null) {
        throw new Exception("Invalid request--unknown id");
    }

    $smallReviews = Story::findByRandomCategory(1, 3);
    $smallInterviews = Story::findByRandomCategory(3, 3);
    $smallFeatures = Story::findByRandomCategory(4, 3);
}
catch (Exception $ex) {
    die($ex->getMessage());
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
    <link rel="stylesheet" href="css/article_styles.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/footer_styles.css">

    <title>Review</title>

</head>

<body>

    <header>
        <div class="container">
            <div class="width-12">
                <div class="logo">
                    <h1>BEST</h1>
                    <a href="index.php"><img src="images/Logos/HeaderLogo.svg"></a>
                    <h1>RECORDS</h1>
                </div>
            </div>
        </div>

        <div class="containerFull">
            <hr>
            <div class="categories container">
                <div class="width-12">
                    <ul>
                        <li>INTERVIEWS</li>
                        <li style="color: red;">REVIEWS</li>
                        <li>NEWS</li>
                        <li>FEATURES</li>
                    </ul>
                </div>
            </div>
        </div>

    </header>

    <section class="reviewArticle">
        <div class="container">

        
            <?php $category = Category::findById($story->category_id); ?>
            <div class="width-7 articleHeading">
                <h1><?=$story->headline ?></h1>
                <h2><?=$story->artist ?></h2>
                <h3>2023</h3>
            </div>
            <div class="reviewImg width-5">
                <img src="<?=$story->image_location ?>" />
            </div>
            
        </div>

        <div class="headingLine"></div>

        <div class="container">
            <div class="byline width-12">
                <h5>By <span style="color: red;"><?=$story->author ?></span></h5>
                <h5>Reviewed: <span style="color: red;">April 25, 2023</span></h5>
            </div>

            <div class="subheading width-12">
                <h4><?=$story->subheading ?></h4>
            </div>

            <div class="articleText width-8">
                <p>
                <?=$story->article ?>
                </p>
            </div>
            

            <div class="width-4">
                <div class="articleHeadingLine"></div>
                <h2>MORE REVIEWS</h2>
                <div class="articleHeadingLine"></div>
                <?php
                foreach ($smallReviews as $story) {?>
                <?php $category = Category::findById($story->category_id); ?>
                <div class="width-4 sidePanel">
                    <img src="<?= $story->image_location ?>" />
                    <div class="panelTxt">
                        <h5><a href="article.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h5>
                        <h6><?= $story->artist ?></h6>
                    </div>
            </div>
                <div class="headingLine"></div>
            <?php }?>
               
                

                <div class="articleHeadingLine"></div>
                <h2>INTERVIEWS</h2>
                <div class="articleHeadingLine"></div>
                <?php
                foreach ($smallInterviews as $story) {?>
                <?php $category = Category::findById($story->category_id); ?>
                <div class="width-4 sidePanel">
                    <img src="<?= $story->image_location ?>" />
                    <div class="panelTxt">
                        <h5><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h5>
                        <h6>By <span style="color: red;"><?=$story->author ?></h6>
                    </div>
            </div>
                <div class="headingLine"></div>
            <?php }?>

                <div class="articleHeadingLine"></div>
                <h2>FEATURES</h2>
                <div class="articleHeadingLine"></div>
                <?php
                foreach ($smallFeatures as $story) {?>
                <?php $category = Category::findById($story->category_id); ?>
                <div class="width-4 sidePanel">
                    <img src="<?= $story->image_location ?>" />
                    <div class="panelTxt">
                        <h5><a href="featurearticle.php?id=<?= $story->id ?>"><?= $story->headline ?></a></h5>
                        <h6>By <span style="color: red;"><?=$story->author ?></h6>
                    </div>
            </div>
                <div class="headingLine"></div>
            <?php }?>
            </div>

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