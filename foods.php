<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
</head>

<body class="home">
    <?php
        include("shared/menu.php");
    ?>

        <section class="hero bg-image" data-image-src="images/img/pimg.jpg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Order Delivery & Take-Out </h1>
                    
                    <div class="banner-form">
                        <form class="form-inline">
                          
                        </form>
                    </div>
                </div>
            </div>
      
        </section>
	
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Tất cả các món ăn</h2>
                </div>
                <div class="row">
						<?php 					
						$query_res= mysqli_query($db,"select * from dishes"); 
                                while($r=mysqli_fetch_array($query_res))
                                {
                                        
                                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/menu_img/dishes/'.$r['img'].'"></div>
                                                <div class="content">
                                                    <h5><a href="dish.php?d_id='.$r['d_id'].'">'.$r['title'].'</a></h5>
                                                    <div class="product-name">'.$r['slogan'].'</div>
                                                    <div class="price-btn-block">';
                                                    include('set-coupon.php');
                                    echo '<a href="dish.php?d_id='.$r['d_id'].'" class="btn theme-btn-dash pull-right">Đặt hàng</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';                                      
                                }	
						?>
                </div>
            </div>
        </section>
        <?php
            include("shared/footer.php");
        ?>
    
    

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>