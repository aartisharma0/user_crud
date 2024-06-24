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
                    <h1 class="display-4 mb-3 animated slideInDown"> Work</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Work</a></li>
                            <li class="breadcrumb-item"><a href="#">Manage</a></li>
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
                <h1 class="text-primary text-uppercase mb-2">Manage Work</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                <div class="container my-5 table-responsive newone" id="welcome">
                     <table class="timetable table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Category </th>
                            <th>Title</th>
                            <th>Work</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('config.php');
                            $query="SELECT * from `work` where `photographer_email`='$_SESSION[pho_email]'";
                            $res=mysqli_query($conn,$query);
                            $sno=1;
                            while($data=mysqli_fetch_array($res)){
                        ?>
                        <tr class="row_1 row_gray">
                            <td>
                            <span ><?php echo $sno;?></span>
                            </td>
                            <td>
                            <span ><?php echo $data['category_name'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['tittle'];?></span> 
                            </td>
                            
                            <td>
                            <span ><img src="work/<?php echo $data['image1']; ?>" class="img-thumbnail"
                                    height="100px" width="100px" ></span>
                            <span ><img src="work/<?php echo $data['image2']; ?>" class="img-thumbnail"
                                    height="100px" width="100px" ></span>
                            </td>
                            <td>
                            <span ><?php echo $data['description'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['price'];?></span> 
                            </td>
                            <td>
                                <a class="btn btn-success" href="update_work.php?id=<?php echo $data['id']?>"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete_work.php?id=<?php echo $data['id']?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                            $sno=$sno+1;
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

<?php
include("footer.php");
?>