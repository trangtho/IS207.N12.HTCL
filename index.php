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
                    
                        <div class="container">

                            <form action="food-search.php" method="POST">
                                <input type="search" name="search" placeholder="Search for Food.." required>
                                <input type="submit" name="submit" value="Search" class="btn btn-primary">
                            </form>

                        </div>
                    
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
                    <h2>Popular Dishes of the Month</h2>
                    <p class="lead">Easiest way to order your favourite food among these top 6 dishes</p>
                </div>
                <div class="row">
						<?php 					
						$query_res= mysqli_query($db,"select * from dishes LIMIT 6"); 
                                while($r=mysqli_fetch_array($query_res))
                                {

                            echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/menu_img/dishes/' . $r['img'] . '"></div>
                                                <div class="content">
                                                    <h5><a href="dish.php?d_id=' . $r['d_id'] . '">' . $r['title'] . '</a></h5>
                                                    <div class="product-name">' . $r['slogan'] . '</div>
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
            <p class="title text-xs-center m-b-30">
                <a href="foods.php">See All Foods</a>
            </p>
        </section>
        <section class="featured-restaurants">
            <div class="container">
                <div class="row">
                    <div class="title text-xs-center m-b-30">
                        <h2>Hôm nay ăn gì</h2>
                        <p class="lead">Thực đơn Jollibee đa dạng và phong phú, có rất nhiều sự lựa chọn cho bạn, gia đình và bạn bè.</p>
                    </div>
          
                </div>
    
                <div class="row">
                    <div class="restaurant-listing">
                        
						
						<?php  
						$ress= mysqli_query($db,"select * from menu");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													
													
													
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rows['title'].'">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?mn_id='.$rows['mn_id'].'" > <img src="admin/menu_img/'.$rows['image'].'" alt="Menu logo"> </a>
																</div>
													
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?mn_id='.$rows['mn_id'].'" >'.$rows['title'].'</a></h5>
																</div>
													
															</div>
												
														</div>
												
													</div>';
										  }
						
						
						?>
						
							
						
					
                    </div>
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