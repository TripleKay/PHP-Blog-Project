
<?php require_once "front_panel/head.php"; ?>
<title>Home</title>

<?php require_once "front_panel/side_header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-4">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            <div class="">
                <div class="dropdown mb-4 text-right">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                    <i class="feather-calender mr-2"></i>Sort News
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="?order_by=created_at&order_type=asc"><i class="feather-arrow-down mr-2"></i>Oldest to Newest</a>
                        <a class="dropdown-item" href="?order_by=created_at&order_type=desc"><i class="feather-arrow-up mr-2"></i>Newest to Oldest</a>
                        <a class="dropdown-item" href="#"><i class="feather-list mr-2"></i>Default</a>
                      
                    </div>
                </div>
                
                <?php 

                    $orderCol = $_GET['order_by'];
                    $orderType = strtoupper($_GET['order_type']);
                    foreach (fPosts($orderCol,$orderType) as $p){

                ?>
                <?php
                    include "single.php";
                ?>
                

                <?php
                    }
                ?>

                
            </div>
        </div>
        <?php require_once "right_siderbar.php"; ?>
    </div>
</div>











<?php require_once "front_panel/footer.php"; ?>
 


    
