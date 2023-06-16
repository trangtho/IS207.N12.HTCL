<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Cảm ơn bạn. Đơn đặt hàng của bạn đã được đặt!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
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
											
												$item_total += ($price*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$price."')";
						
														mysqli_query($db,$SQL);
														
                                                        
                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);
                                                        unset($price);
														$success = "Cảm ơn bạn. Đơn đặt hàng của bạn đã được đặt!";

                                                        function_alert();

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
        <?php
            include("shared/menu.php");
        ?>
        <div class="page-wrapper">
                <div class="container">
                 
					    <span style="color:green;">
								<?php echo $success; ?>
						</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Giỏ hàng</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Tổng đơn hàng</td>
                                                        <td> <?php echo $item_total." VND"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phí vẫn chuyển</td>
                                                        <td>Miễn phí</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Tổng</strong></td>
                                                        <td class="text-color"><strong> <?php echo $item_total." VND"; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Thanh toán khi giao hàng</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Chuyển khoản <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Bạn có muốn xác nhận đơn hàng?');" name="submit"  class="btn btn-success btn-block" value="Đặt hàng"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            <?php
                include("shared/footer.php");
            ?>
        </div>
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

<?php
}
?>
