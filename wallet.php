<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php 
    if(isset($_POST['pay-btn'])){
        if(payNow()){
            linkTo("wallet.php");
        }
    }
                    
?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
              
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-dollar-sign text-primary mr-2"></i>Wallet Manager
                    </h4>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="feather-user mr-2">
                            Your Money : $ <?php echo user($_SESSION['user']['id'])['money']; ?>
                        </i>
                    </a>
                </div>
                <hr>
                
                <form action="#" method="POST">
                    <div class="form-inline">
                        <select name="to_user" class="custom-select mr-2 w-25" id="">
                            <option value="0" selected disabled>Select User</option>
                            <?php foreach(users() as $user){ ?>
                                <?php if($user['id'] != $_SESSION['user']['id']){ ?>
                                <option value="<?php echo $user['id'] ?>" ><?php echo $user['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="number" name="amount" placeholder="Pay Amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money']; ?>" class="form-control w-25 mr-2" required>
                        <input type="text" name="description" placeholder="For What" required class="form-control mr-2">
                        <button name="pay-btn" type="submit" class="btn btn-primary">Transfer<i class="feather-send text-white ml-2"></i></button>
                    </div>
                    
                </form>

                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>For What</th>
                            <th>Date / Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach(transitions() as $t){ ?>
                                <tr>
                                    <td><?php echo $t['id']; ?></td>
                                    <td><?php echo user($t['from_user'])['name']; ?></td>
                                    <td><?php echo user($t['to_user'])['name']; ?></td>
                                    <td><i class="feather-dollar-sign mr-2 text-primary"></i><?php echo $t['amount']; ?></td>
                                    <td><?php echo $t['description']; ?></td>
                                    <td><?php echo date("d-m-Y / h:i",strtotime($t['created_at'])); ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
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