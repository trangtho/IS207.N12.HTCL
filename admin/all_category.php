<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Category</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">

    <?php include("shared/menu.php"); ?>    
        <div class="page-wrapper">

            
        
            <div class="container-fluid">
         
                <div class="row">
                    <div class="col-12">
                        
						
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Tất cả thực đơn</h4>
                            </div>
								
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
															echo '<td colspan="11"><center>Không có thực đơn</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																				
																					echo ' <tr><td>'.$rows['mn_id'].'</td>
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['des'].'</td>
																								
																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="menu_img/'.$rows['image'].'" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
																								</div></td>
																									 <td><a href="delete_category.php?cat_del='.$rows['mn_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_category.php?cat_upd='.$rows['mn_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
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
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>