<?php
include("header.php");
if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}  
?>
<style>
    .container{
        margin-top:30px;
    }
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
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $query="SELECT * from `category` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        $data=mysqli_fetch_array($res);
    }
?>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Category</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
                            <li class="breadcrumb-item"><a href="#">Update</a></li>
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
                <h1 class="text-primary text-uppercase mb-2">Update Category</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                <div class="col-md-2"></div>
                    <div class="col-md-12 card-body newone font3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="login"  enctype="multipart/form-data">
                            <div class="row form-floating mb-5 mt-5">
                                <div class="col-md-12 register-top-grid d-flex">
                                    <span >Category Name<label>*</label></span>
                                    <input type="text" name="category_name" value="<?php echo $data['category_name']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class=" row form-floating mb-5 mt-5">
                                <div class="col-md-12  d-flex">
                                    <span >Category Image<label>*</label></span>
                                    <input type="file" name="category_image" value="<?php echo $data['category_image']?>"class="form-control" >
                                    <input type="hidden" name="hidden_image" class="form-control"
                            value="<?php echo $data['category_image']?>">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']?>">
                                </div>
                            </div>  
                            <div class="form-floating mb-2 mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" name="add">Update</button>
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
    $id=$_REQUEST['id'];
    $category_name=$_REQUEST['category_name'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['category_image'])){
        $img_name=$_REQUEST['hidden_image']; 
        if($_FILES['category_image']['name']){
        $name=$_FILES['category_image']['name'];
        $tmp_path=$_FILES['category_image']['tmp_name'];
        $size=$_FILES['category_image']['size'];
        $ext=$_FILES['category_image']['type'];
        $new_name=rand().".".$name;
        move_uploaded_file($tmp_path,"category_images/".$new_name);
        }else{
            $new_name=$img_name;
        }
        include('config.php');
        $query = "UPDATE `category` SET `category_name`='$category_name', `category_image`='$new_name' WHERE `id`='$id'";
        echo $query;
        $res=mysqli_query($conn,$query);
        echo $query;
        if($res>0){
            echo "<script>window.location.assign('view_category.php?msg=Category Updated Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('view_category.php?msg=Something Went Wrong!!')</script>";
        }
    }
  
}

?>