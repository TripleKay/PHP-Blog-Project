<div class="col-12 col-md-4">
            <div class="front-panel-right-siderbar">

                <div class="card">
                    <div class="card-body">
                        <?php if(isset($_SESSION['user']['id'])){ ?>
                            <p>
                                Hi <b><?php echo $_SESSION['user']['name']; ?></b>
                            </p>
                            <a href="dashboard.php" class="btn btn-primary">Go Dashboard<i class="feather-arrow-right ml-2"></i></a>
                        <?php }else{ ?>
                            <p>
                                Hi <b>Guest</b>
                            </p>
                            <a href="register.php" class="btn btn-danger">Register Here<i class="feather-arrow-right ml-2"></i></a>
                        <?php } ?>
                        
                    </div>
                </div>
                <h4 class="mt-3 mb-3">Category List</h4>
                <div class="list-group ">
                    <a href="<?php echo $url; ?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])?'':'active'; ?>">
                        All Categories
                    </a>        
                    <?php 
                        foreach (fCategories() as $c){

                    ?>
                    
                    <a href="category_based_post.php?category_id=<?php echo $c['id']; ?>" 
                        class="list-group-item list-group-item-action 
                        <?php echo isset($_GET['category_id'])? ($_GET['category_id'] == $c['id']? "active" : '') : '' ; ?>">
                        <?php echo $c['title']; ?>
                        <?php if($c['ordering'] == 1){ ?> 
                            <i class="feather-paperclip ml-2 text-primary"></i>    
                        <?php } ?>
                    </a>

                    <?php
                        }
                    ?>
                    
                    
                </div>
                
                <div class="mt-3">
                    <h4>Search By Date</h4>
                    <div class="card">
                        <div class="card-body">
                        <form action="search_by_date.php" method="POST">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="date" name="start" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="date" name="end" class="form-control" required>
                            </div>
                            <button class="btn btn-primary">
                                <i class="feather-calendar mr-2"></i>Search
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>