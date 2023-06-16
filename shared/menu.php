<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt="Logo nhà hàng"> </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="category.php">Thực đơn <span class="sr-only"></span></a> </li>
                    
                   
					<?php
				if(empty($_SESSION["user_id"])) // if user is not login
					{
						echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng nhập</a> </li>
					  <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng ký</a> </li>';
					}
				else
					{
							
							echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn hàng của tôi</a> </li>';
							echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng xuất</a> </li>';
					}
				?>
					 
                </ul>
				 
            </div>
        </div>
    </nav>
</header>