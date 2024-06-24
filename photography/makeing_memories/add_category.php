<?php
include("header.php");
if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}  
?>
<style>
    
	#welcome{
     
        width:100%;
        border:1px solid rgb(255, 219, 88);
        margin:10px;
        padding-top:90px;
        
    }
    .newone{
        border:2px solid rgb(255, 219, 88);
        box-shadow: 5px 5px 9px rgb(255, 219, 88);
        padding:40px;
        margin-top:20px;
        margin-bottom: 20px;
        
    }
    .font3{
        color:black;
        font-weight:400px;
        font-size:30px;
    }
 
    
</style>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Category</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <?php if(isset($_GET['msg'])){?>
            <div class="alert alert-primary alert-dismissible " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="text-primary text-uppercase mb-2">Welcome Admin</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                <div class="col-md-2"></div>
                    <div class="col-md-12 card-body newone font3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="login"  enctype="multipart/form-data">
                            <div class="row form-floating mb-5 mt-5">
                                <div class="col-md-12 register-top-grid d-flex ">
                                <span><label>Category Name</label></span>
                                    <input type="text" name="category_name" class=" mx-2 form-control ms-2" placeholder="Enter Category Name" required>
                                </div>
                            </div>
                            <div class=" row form-floating mb-5 mt-5 ">
                                <div class="col-md-12 d-flex">
                                <span><label>Category Image</label></span>

                                    <input type="file" name="category_image" class="mx-2 form-control" required>
                                </div>
                            </div>  
                            <div class="form-floating mb-2 mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg " name="add">Add</button>
                            </div>
                        </form>
                        
                    </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
 </div>
</div>

<?php
include("footer.php");
?>
<?php
if(isset($_REQUEST['add'])){
    $category_name=$_REQUEST['category_name'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['category_image'])){
        $name=$_FILES['category_image']['name'];
        // print_r($name);
        $tmp_path=$_FILES['category_image']['tmp_name'];
        // print_r("<br>".$tmp_path);
        $size=$_FILES['category_image']['size'];
        // print_r("<br>".$size);
        $ext=$_FILES['category_image']['type'];
        // print_r("<br>".$ext);
        $new_name=rand().".".$name;
        // print_r("<br>".$new_name);
        move_uploaded_file($tmp_path,"category_images/".$new_name);
        include('config.php');
        $query="INSERT INTO `category`(`category_name`, `category_image`) VALUES ('$category_name','$new_name')";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('add_category.php?msg=Category Added Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('add_category.php?msg=Category Already Exist!')</script>";
        }
    }
  
}

?>