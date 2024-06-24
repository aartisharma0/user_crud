<?php
include("header.php");
if(!isset($_SESSION['pho_email']))
{
    echo "<script>window.location.assign('photographerlogin.php?msg=Login Yourself!!')</script>";
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
                    <h1 class="display-4 mb-3 animated slideInDown">Photographer</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Work</a></li>
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
                <h1 class="text-primary text-uppercase mb-2">Add Work</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                <div class="col-md-2"></div>
                    <div class="col-md-12 card-body newone font3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="login"  enctype="multipart/form-data">
                            <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-2 register-top-grid justify-content-center">
                                <label><h3>Category</h3></label>
                                </div>
                                <div class="col-md-10 register-top-grid justify-content-center mt-2 ">
                                    <select name="category" required class="form-control">
                                <option selected disabled value="">Select Category</option>
                                <?php
                                     include('config.php');
                                     $query="SELECT * from `category`";
                                     $res=mysqli_query($conn,$query);
                                     while($data=mysqli_fetch_array($res)){
                                ?>
                                <option value="<?php echo $data['category_name']?>"><?php echo $data['category_name']?></option>
                                <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-2 register-top-grid justify-content-center">
                                <label><h3>Title</h3></label>
                                </div>
                                <div class="col-md-10 register-top-grid justify-content-center mt-2  ">
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-2 register-top-grid justify-content-center">
                                <label><h3>Image 1</h3></label>
                                </div>
                                <div class="col-md-10 register-top-grid justify-content-center mt-2 ">
                                    <input type="file" name="category_image1" class="form-control" placeholder="Enter Category Name" required>
                                </div>
                            </div>
                             <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-2 register-top-grid justify-content-center mt-2 ">
                                <label><h3>Image 2</h3></label>
                                </div>
                                <div class="col-md-10 register-top-grid justify-content-center ">
                                    <input type="file" name="category_image2" class="form-control" placeholder="Enter Category Name" required>
                                </div>
                            </div>
                            <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-3 register-top-grid justify-content-center">
                                <label><h3>Description</h3></label>
                                </div>
                                <div class="col-md-9 register-top-grid justify-content-center mt-2  ">
                                    <textarea name="description" cols="30" rows="1" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-floating mb-5 mt-5 d-flex">
                                <div class="col-md-2 register-top-grid justify-content-center">
                                <label><h3>Price</h3></label>
                                </div>
                                <div class="col-md-10 register-top-grid justify-content-center mt-2  ">
                                    <input type="number" name="price" min="1000" max="10000000" class="form-control" placeholder="Enter Title" required>
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
    $category_name=$_REQUEST['category'];
    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $price=$_REQUEST['price'];
    $email=$_SESSION['pho_email'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['category_image1'])&isset($_FILES['category_image2'])){
        $name1=$_FILES['category_image1']['name'];
        $name2=$_FILES['category_image2']['name'];
        $tmp_path1=$_FILES['category_image1']['tmp_name'];
        $tmp_path2=$_FILES['category_image2']['tmp_name'];
        $size1=$_FILES['category_image1']['size'];
        $size2=$_FILES['category_image2']['size'];
        $ext1=$_FILES['category_image1']['type'];
        $ext2=$_FILES['category_image2']['type'];
        $new_name1=rand().".".$name1;
        $new_name2=rand().".".$name2;
        move_uploaded_file($tmp_path1,"work/".$new_name1);
        move_uploaded_file($tmp_path2,"work/".$new_name2);
        include('config.php');
        $query="INSERT INTO `work`(`category_name`, `tittle`,`description`,`image1`,`image2`,`photographer_email`,`price`) VALUES ('$category_name','$title','$description','$new_name1','$new_name2','$email','$price')";
        $res=mysqli_query($conn,$query);
        echo $query;
        if($res>0){
            echo "<script>window.location.assign('add_work.php?msg=Work Added Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('add_work.php?msg=Something Went Wrong!!')</script>";
        }
    }
  
}

?>