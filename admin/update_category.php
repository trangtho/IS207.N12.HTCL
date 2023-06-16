<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if(isset($_POST['submit']))           //if upload btn is pressed
{
    if (empty($_POST['mn_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
    }
	else
		{	
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "menu_img/".basename($fnew);                     
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{		
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.
															</div>';	   
										}		
									else
										{				                                 
												$sql = "update menu set title='$_POST[mn_name]',des='$_POST[des]',image='$fnew' where mn_id='$_GET[cat_upd]'";
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>cập nhật thực đơn thành công!</strong>
															</div>';	
										}
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
    <title>Update Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
</head>

<body class="fix-header">
    <?php include("shared/menu.php"); ?>
      
        <div class="page-wrapper">
        
            
          
            <div class="container-fluid">
        
                  
									
									<?php  echo $error;
									        echo $success; ?>
									
									
								
								
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Cập nhật thực đơn</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <?php $qml ="select * from menu where mn_id='$_GET[cat_upd]'";
													$rest=mysqli_query($db, $qml); 
													$roww=mysqli_fetch_array($rest);
														?>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên thực đơn</label>
                                                    <input type="text" name="mn_name" value="<?php echo $roww['title'];?>" class="form-control" placeholder="Tên thực đơn">
                                                   </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Mô tả </label>
                                                    <input type="text" name="des" value="<?php echo $roww['des'];?>"  class="form-control" placeholder="Mô tả">
                                                </div>
                                            </div>
                             
                                        </div>
                                 
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>
     
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                        <a href="all_menu.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

					<footer class="footer"> © 2022 - Online Food Ordering System </footer>
					
                </div>
             
            </div>

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