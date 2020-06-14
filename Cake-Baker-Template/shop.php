<!DOCTYPE html>
<?php 
session_start();// pour activer la session 
include_once "config.php";
include_once "core/produitC.php";
$produitC= new produitC();

if (!isset($_SESSION['panier'])) {
    session_name('panier');
    $_SESSION['panier'][]= [];
}
if (!isset($_SESSION['user'])) {
    session_name('user');
    $_SESSION['user']= [ 'nom'=> "Anonyme", 'id'=> "1", 'email'=> "eya.yousfi@esprit.tn" ];
}
if (isset($_GET['id'])) {
    $listeproduit1=$produitC->recupererproduit($_GET['id']);
foreach ($listeproduit1 as $row) {
if (isset($_GET['add'])&&isset($_SESSION['panier'][$row['idProduit']])) {
  $_SESSION['panier'][$row['idProduit']]['quantite']++;
  // si l'utilisateur appui sur add et qu'il ya deja le produit c'est juste la qte qui augmente
}

else if (isset($_GET['add'])) {
  
    $_SESSION['panier'][$row['idProduit']]=[ 'image'=> $row['image'], 'nom'=> $row['Nom'], 'prix'=> $row['Prix'], 'quantite'=> 1, 'id'=> $row['idProduit'] ];
    // s'il n'a pas de produit alors on met le produit dans le panier 
}
}
}
?>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/t/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Delice-Du-Jour</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        <link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        
        <link href="css/style2.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--================Main Header Area =================-->
        <header class="main_header_area">
            <div class="top_header_area row m0">
                <div class="container">
                    <div class="float-left">
                        <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (265) 24001001</a>
                        <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@delicedujour.com</a>
                    </div>
                    <div class="float-right">
                        <ul class="h_social list_style">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <ul class="h_search list_style">
                            <li class="shop_cart"><a href="cart.php"><i class="lnr lnr-cart"></i></a></li>
                            <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_menu_area">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                        <img src="img/t/logo.png" alt="">
                        <img src="img/t/logo-2.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="my_toggle_menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="cake.html">Our Cakes</a></li>
                                <li><a href="menu.html">Menu</a></li>
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="our-team.html">Our Chefs</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="navbar-nav justify-content-end">
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="service.html">Services</a></li>
                                        <li class="dropdown submenu">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gallery</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="portfolio.html">-  Gallery Classic</a></li>
                                                <li><a href="portfolio-full-width.html">-  Gallery Full width</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="what-we-make.html">What we make</a></li>
                                        <li><a href="special.html">Special Recipe</a></li>
                                        <li><a href="404.html">404 page</a></li>
                                        <li><a href="comming-soon.html">Coming Soon page</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog.html">Blog with sidebar</a></li>
                                        <li><a href="blog-2column.html">Blog 2 column</a></li>
                                        <li><a href="single-blog.html">Blog details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="shop.php">Main shop</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="cart.php">Cart Page</a></li>
                                        <li><a href="checkout.php">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_text">
                    <h3>Shop</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Product Area =================-->
        <section class="product_area p_100">
            <div class="container">
                <div class="row product_inner_row">
                    <div class="col-lg-9">
                        <div class="row m0 product_task_bar"> 
                            <div class="product_task_inner"> 
                                <div class="float-left">
                                    <a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                    <span>Showing 1 - 10 of 55 results</span>
                                </div>
                                <div class="float-right">
                                    <h4>Sort by :</h4>
                                    <select class="short">
                                        <option data-display="Default">Default</option>
                                        <option value="1">Default</option>
                                        <option value="2">Default</option>
                                        <option value="4">Default</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row product_item_inner">
                            <?php
                            $listeproduit=$produitC->afficherproduit();
                            foreach ($listeproduit as $row) { ?>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="cake_feature_item">
                                    <div class="cake_img">
                                        <img src="apercu2.php?id_img=<?php echo $row['idProduit']; ?>" alt="">
                                    </div>
                                    <div class="cake_text">
                                        <h4>$<?php echo $row['Prix']; ?></h4>
                                        <h3><?php echo $row['Nom']; ?></h3>
                                        <a class="pest_btn" href="?id=<?php echo $row['idProduit']; ?>&add=1">Ajouter à la carte</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                        <div class="product_pagination">
                            <div class="left_btn">
                                <a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
                            </div>
                            <div class="middle_list">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product_left_sidebar">
                            <aside class="left_sidebar search_widget">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Search Keywords">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="icon icon-Search"></i></button>
                                    </div>
                                </div>
                            </aside>
                            <aside class="left_sidebar p_catgories_widget">
                                <div class="p_w_title">
                                    <h3>Product Categories</h3>
                                </div>
                                <ul class="list_style">
                                    <li><a href="#">Cupcake (17)</a></li>
                                    <li><a href="#">Chocolate (15)</a></li>
                                    <li><a href="#">Celebration (14)</a></li>
                                    <li><a href="#">Wedding Cake (8)</a></li>
                                    <li><a href="#">Desserts (11)</a></li>
                                </ul>
                            </aside>
                            <aside class="left_sidebar p_price_widget">
                                <div class="p_w_title">
                                    <h3>Filter By Price</h3>
                                </div>
                                <div class="filter_price">
                                    <div id="slider-range"></div>
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount" readonly />
                                    <a href="#">Filter</a>
                                </div>
                            </aside>
                            <aside class="left_sidebar p_sale_widget">
                                <div class="p_w_title">
                                    <h3>Top Sale Products</h3>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/sale-product/s-product-1.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h4>Brown Cake</h4></a>
                                        <ul class="list_style">
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                        <h5>$29</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/sale-product/s-product-2.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h4>Brown Cake</h4></a>
                                        <ul class="list_style">
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                        <h5>$29</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/sale-product/s-product-3.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h4>Brown Cake</h4></a>
                                        <ul class="list_style">
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                        <h5>$29</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/sale-product/s-product-4.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h4>Brown Cake</h4></a>
                                        <ul class="list_style">
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                        <h5>$29</h5>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Area =================-->
        
        <!--================Newsletter Area =================-->
        <section class="newsletter_area">
            <div class="container">
                <div class="row newsletter_inner">
                    <div class="col-lg-6">
                        <div class="news_left_text">
                            <h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter_form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Newsletter Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="footer_widgets">
                <div class="container">
                    <div class="row footer_wd_inner">
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_about_widget">
                                <img src="img/footer-logo.png" alt="">
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui bland itiis praesentium voluptatum deleniti atque corrupti.</p>
                                <ul class="nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_link_widget">
                                <div class="f_title">
                                    <h3>Quick links</h3>
                                </div>
                                <ul class="list_style">
                                    <li><a href="#">Your Account</a></li>
                                    <li><a href="#">View Order</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditionis</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_link_widget">
                                <div class="f_title">
                                    <h3>Work Times</h3>
                                </div>
                                <ul class="list_style">
                                    <li><a href="#">Mon. :  Fri.: 8 am - 8 pm</a></li>
                                    <li><a href="#">Sat. : 9am - 4pm</a></li>
                                    <li><a href="#">Sun. : Closed</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_contact_widget">
                                <div class="f_title">
                                    <h3>Contact Info</h3>
                                </div>
                                <h4>(265)24001001</h4>
                                <p>Adress <br />Ariana ,rue des roses </p>
                                <h5>info@contact.com</h5>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_copyright">
                <div class="container">
                    <div class="copyright_inner">
                        <div class="float-left">
                            <h5><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></h5>
                        </div>
                        <div class="float-right">
                            <a href="#">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>