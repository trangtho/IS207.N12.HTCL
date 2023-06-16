<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if (isset($_POST['submit'])) {
    if (empty($_POST['mn_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "menu_img/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.
															</div>';
            } else {
                $sql = "INSERT INTO menu(title,des,image) VALUE('" . $_POST['mn_name'] . "','" . $_POST['des'] . "','" . $fnew . "')"; // store the submited data ino the database :images
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success = '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                Một thực đơn mới đã được thêm.
															</div>';
            }
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>select image</strong>
															</div>';
        } else {

            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid extension!</strong>png, jpg, Gif are accepted.
															</div>';
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
    <title>Add Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <?php include("shared/menu.php"); ?>
        <div class="page-wrapper">
     
            
         
            <div class="container-fluid">
                <!-- Start Page Content -->
                  
									
									<?php  echo $error;
									        echo $success; ?>
									
									
								
								
                                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Category</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên món án</label>
                                                    <input type="text" name="mn_name" class="form-control" >
                                                   </div>
                                            </div>
                                        </div>
                                            <div class="row p-t-20">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Mô tả </label>
                                                    <input type="text" name="des" class="form-control" placeholder="VND">
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
                                        <a href="add_menu.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col-12">
 
                       
 <div class="card">
     <div class="card-body">
         <h4 class="card-title">Danh sách thực đơn</h4>
      
         <div class="table-responsive m-t-40">
             <table id="myTable" class="table table-bordered table-hover table-striped">
                 <thead class="thead-dark">
                     <tr>
                         <th>Mã số</th>
                         <th>Tên thực đơn</th>
                         <th>Mô tả</th> 
                         <th>Hình ảnh</th>                                             
						<th>Thêm</th>
						 
                     </tr>
                 </thead>
                 <tbody>
                    
					
					<?php
						$sql="SELECT * FROM menu order by mn_id asc";
						$query=mysqli_query($db,$sql);
						
							if(!mysqli_num_rows($query) > 0 )
								{
									echo '<td colspan="7"><center>Không có thực đơn nào!</center></td>';
								} else {
                         while ($rows = mysqli_fetch_array($query)) {
                             echo ' <tr><td>' . $rows['mn_id'] . '</td>
																		<td>' . $rows['title'] . '</td>
																		<td>' . $rows['des'] . '</td>
																		<td><div class="col-md-3 col-lg-8 m-b-10">
                                                                             <center><img src="menu_img/' . $rows['image'] . '" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
                                                                         </div></td>
																			 <td><a href="delete_category.php?cat_del=' . $rows['mn_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																			 <a href="update_category.php?cat_upd=' . $rows['mn_id'] . '" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
																			</td></tr>';
                         }
                     }
						
					
					?>
                      
                     
                    
                 </tbody>
             </table>
         </div>
     </div>
 </div>
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