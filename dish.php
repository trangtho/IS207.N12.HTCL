<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
    <?php
        include("shared/menu.php");
    ?>
        <div class="page-wrapper">
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                        <div class="widget widget-cart">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Your Cart
                                </h3>
							  				  
							  
                            <div class="clearfix"></div>
                        </div>
                            <div class="order-row bg-white">
                                    <div class="widget-body">				
	                                    <?php
                                        $item_total = 0;
                                        foreach ($_SESSION["cart_item"] as $item)  
                                        {
                                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                                            $date = getdate();
                                            $weekdate = $date['weekday'];
                                            $hour = $date['hours'];
                                            if($weekdate=="Monday"||$weekdate=="Wednesday"||$weekdate=="Friday"){
                                                if($hour>=10&&$hour<=14){
                                                    $price = $item["price"] / 2;
                                                }
                                                else{
                                                    $price = $item["price"];
                                                }
                                            }
                                            else {
                                                $price = $item["price"];
                                            }
                                        ?>									
									
                                        <div class="title-row">
	                                        <?php echo $item["title"]; ?><a href="dish.php?d_id=<?php echo $_GET['d_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
	                                        <i class="fa fa-trash pull-right"></i></a>
	                                    </div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control b-r-0" value=<?php echo $price; ?> readonly id="exampleSelect1">
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> 
                                            </div>  
        
                                        </div>
									  
	                                    <?php
                                        $item_total += ($price*$item["quantity"]); 
                                        }
                                        ?>								  
                                    </div>
                            </div>
                               
                         
                             
                            <div class="widget-body">
                                <div class="price-wrap text-xs-center">
                                    <p>TOTAL</p>
                                    <h3 class="value"><strong><?php echo $item_total; ?></strong></h3>
                                    <p>Free Delivery!</p>
                                    <?php
                                    if($item_total==0){
                                    ?>
                                    <a href="checkout.php?d_id=<?php echo $_GET['d_id'];?>&action=check"  class="btn btn-danger btn-lg disabled">Checkout</a>

                                    <?php
                                    }
                                    else{   
                                    ?>
                                    <a href="checkout.php?d_id=<?php echo $_GET['d_id'];?>&action=check"  class="btn btn-success btn-lg active">Checkout</a>
                                    <?php   
                                    }
                                    ?>

                                </div>
                            </div>	
								
                        </div>
                    </div>

                    <div class="col-md-8">
                      
             
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Món ăn
                                    <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                        <i class="fa fa-angle-right pull-right"></i>
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  
							$stmt = $db->prepare("select * from dishes where d_id='$_GET[d_id]'");
							$stmt->execute();
							$products = $stmt->get_result();
							if (!empty($products)) 
							{
								foreach($products as $product)
								    {
						 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='dish.php?d_id=<?php echo $_GET['d_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/menu_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                            </div>
                           
                                        </div>
                               
                                        <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
										<span class="price pull-left" >
                                            <?php
                                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                $date = getdate();
                                                $weekdate = $date['weekday'];
                                                $hour = $date['hours'];
                                                if($weekdate=="Monday"||$weekdate=="Wednesday"||$weekdate=="Friday"){
                                                    if($hour>=10&&$hour<=14){?>
                                                        <p class="food-price"><?php echo $product['price']/2; ?> VND</p>
                                                        <p class="food-price"><del><?php echo $product['price']; ?></del> VND</p>
                                                    <?php }
                                                    else{?>
                                                        <p class="food-price"><?php echo $product['price']; ?> VND</p><?php
                                                    }
                                                }
                                                else {?>
                                                    <p class="food-price"><?php echo $product['price']; ?> VND</p><?php
                                                }
                                            ?>
                                        </span>
										  <input class="b-r-0" type="number" name="quantity"  style="margin-left:30px;" value="1"/>
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Cart" />
										</div>
										</form>
                                    </div>
              
                                </div>
                
								
								<?php
									  }
									}
									
								?>
								
								
                              
                            </div>
             
                        </div>
            
                       
                    </div>
                    
                </div>
     
            </div>
            <?php
                include("shared/footer.php");
            ?>

      
        </div>


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
