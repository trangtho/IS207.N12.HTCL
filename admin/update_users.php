<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Các mục là bắt buộc!</strong>
															</div>';
		}
	else
	{
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
	}
	
	else{
       
	
	$mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST['password'])."' where u_id='$_GET[user_upd]' ";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Cập nhật khách hàng thành công!</strong></div>';
	
    }
	}

}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Users</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <?php include("shared/menu.php"); ?>
        </div>
   
        <div class="page-wrapper" style="height:1200px;">
       
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Bảng điều khiển</h3> </div>
               
            </div>
         
            <div class="container-fluid">
            
                     <div class="row">
                   
                   
					
					 <div class="container-fluid">
              
                  
									
									<?php  
									        echo $error;
									        echo $success; 
											
											
											
											?>
									
									
								
								
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Cập nhật khách hàng</h4>
                            </div>
                            <div class="card-body">
							  <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                <form action='' method='post'  >
                                    <div class="form-body">
                                      
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên người dùng</label>
                                                    <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="username">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Họ</label>
                                                    <input type="text" name="fname" class="form-control form-control-danger"  value="<?php  echo $newrow['f_name'];  ?>" placeholder="jon">
                                                    </div>
                                            </div>
                                      
                                        </div>
                                    
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên </label>
                                                    <input type="text" name="lname" class="form-control" placeholder="doe"  value="<?php  echo $newrow['l_name']; ?>">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control form-control-danger"  value="<?php  echo $newrow['email'];  ?>" placeholder="example@gmail.com">
                                                    </div>
                                            </div>
                                        
                                        </div>
                                   
										 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mật khẩu</label>
                                                    <input type="text" name="password" class="form-control form-control-danger"   value="<?php  echo $newrow['password'];  ?>" placeholder="password">
                                                    </div>
                                                </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Số điện thoại</label>
                                                    <input type="text" name="phone" class="form-control form-control-danger"   value="<?php  echo $newrow['phone'];  ?>" placeholder="phone">
                                                    </div>
                                                </div>
                                            </div>
                                 
                                            
                                      
                                        
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                        <a href="all_users.php" class="btn btn-inverse">Hủy</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
                </div>
       
            </div>
      
            <footer class="footer"> © 2022 - Online Food Ordering System </footer>
        
        </div>
      
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>