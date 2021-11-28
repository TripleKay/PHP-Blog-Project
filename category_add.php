<?php require_once "core/auth.php"; ?>
<?php require_once "core/isEditorAndAdmin.php"; ?>
<?php include "template/header.php"; ?>
<?php require_once "core/function.php"; ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
              
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary mr-2"></i>Category Manager
                    </h4>
                    <a href="<?php echo $url; ?>/item_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <?php 
                        if(isset($_POST['add-cat-btn'])){
                            echo categoryAdd();
                        }
                    
                    ?>
                <form action="#" method="POST">
                    <div class="form-inline">
                        <input type="text" name="title" class="form-control mr-2">
                        <button name="add-cat-btn" type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                    
                </form>

                <?php include "category_list.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>