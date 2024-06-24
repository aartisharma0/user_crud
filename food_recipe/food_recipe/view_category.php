<?php
    include_once('header.php');
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>View Category</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
<div class="container">
    <div class="row service-v1 margin-bottom-40">
        <?php 
            include( 'config.php' );
            $query = 'SELECT * FROM `category`';
            $result = mysqli_query( $conn, $query );
            while( $row = mysqli_fetch_array( $result ) ) 
            {
        ?>
        <div class="col-md-4 my-5">
            <div class="card small">
                <div class="card-image">
                        <img class="img-responsive" src="category/<?php echo $row['category_image'] ?>" alt="" style="height:250px; width:100%">  
                        <a href="view_subcategory.php?id=<?php echo $row['category_name'] ?>"><h1 class="card-title text-center"><?php echo $row['category_name'] ?></h1></a>
                </div>
                <!-- <div class="card-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                    </p>
                </div> -->
            </div>        
        </div>
        <?php
            }
        ?>
    </div>
</div>
<!-- End Service Blcoks -->

<?php
    include_once("footer.php");
?>