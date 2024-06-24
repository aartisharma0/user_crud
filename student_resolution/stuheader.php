<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Student Problem Resolution</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .font{
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        font-size: 40px;
        color: wheat !important;
    }
</style>
</head>
<body class="host_version"> 
    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

    <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
			<div class="container-fluid">
				<a class="navbar-brand font" href="index.php">
					<!-- <img src="images/logo.png" alt="" /> -->
                    CampusResolve
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">about</a></li>
						<li class="nav-item"><a class="nav-link" href="add_comp.php">Complaint</a></li>
						<li class="nav-item"><a class="nav-link" href="track_status.php">Track Status</a></li>
						<li class="nav-item"><a class="nav-link" href="add_enquiry.php">Contact</a></li>
					</ul>
                    <?php if(isset($_SESSION['stu_email'])){?>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="logout.php"><span>Logout</span></a></li>
                    </ul>
                    <?php } ?>
                    <?php if(!isset($_SESSION['stu_email'])){?>
                    <ul class="nav navbar-nav navbar-right px-5">
                        <li class="nav-item dropdown px-5">
                            <a class="nav-link dropdown-toggle hover-new log w-100" href="#" id="dropdown-a" data-toggle="dropdown">Login</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="studentlogin.php">Student</a>
                                <a class="dropdown-item" href="hodlogin.php">Hod</a>
                                <a class="dropdown-item" href="adminlogin.php">Admin</a>
                            </div>
                        </li>
                    </ul>
                    <?php } ?>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->