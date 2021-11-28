
<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php 
    $id = $_GET['id'];
    $current = post($id);
 ?>

<div class="row">
    <div class="col-12 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $current['title']; ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-info mr-2 text-primary"></i>Post Detail
                    </h4>

                    
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a>
                        <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-secondary full-screen-btn">
                                <i class="feather-list"></i>
                        </a>
                    </div>
                </div>
                <hr>

                <h4>
                    <?php echo $current['title']; ?>
                </h4>
                <div class="my-3">
                    <i class="feather-user text-danger mr-2"></i>
                    <?php echo user($current['user_id'])['name']; ?>
                    <i class="feather-layers text-primary ml-3 mr-2"></i>
                    <?php echo category($current['category_id'])['title']; ?>
                    <i class="feather-user text-success ml-3 mr-2""></i>
                    <?php echo date("j M Y",strtotime($current['created_at'])); ?>

                </div>
                <div class="">
                <?php echo html_entity_decode($current['description']); ?>
                   
                </div>
               
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $(".table").dataTable({
        "order": [[0,"desc"]]
    });
</script>