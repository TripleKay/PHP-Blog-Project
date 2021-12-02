<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>

 <!--content Area Start-->
 <div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/visitor_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-heart h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('viewers'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Today Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('posts'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('categories'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('users'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-12 col-xl-7">
        <div class="card overflow-hidden shadow mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Visitors</h4>
                    <div class="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                    </div>
                </div>
                <canvas id="ov" height="140"></canvas>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Category By Posts</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>
                
                <canvas id="op" height="200"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="card overflow-hidden px-3 shadow-sm mb-4">

            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Recent Posts</h4>
                    <div class="">
                    <?php 
                        $currentUserId = $_SESSION['user']['id'];
                        $allPostTotal = countTotal("posts");
                        $postTotalByCurrentUser = countTotal("posts","user_id = $currentUserId");
                        $postTotalByCurrentUserPercentage = ($postTotalByCurrentUser/$allPostTotal)*100;
                        $finalPercentage = floor($postTotalByCurrentUserPercentage);
                    
                    ?>
                        <small>Your Post: <?php echo $postTotalByCurrentUser;?></small>
                    <div class="progress" style="width: 300px; height: 10px">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $finalPercentage;?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Viewer Count</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
                            foreach(dashboard_posts('5') as $c ){
                        ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo short($c['title']); ?></td>
                                <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>
                                <td class="text-nowrap"><?php echo category($c['category_id'])['title'] ; ?></td>
                                <td class="text-nowrap text-capitalize"><?php echo user($c['user_id'])['name'] ; ?></td>
                                <td><?php echo count(viewerCountByPost($c['id'])); ?></td>
                                <td class="text-nowrap">
                                    <a href="post_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm"><i class="feather-info fa-fw"></i></a>
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="feather-trash-2 fa-fw"></i></a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm"><i class="feather-edit-2 fa-fw"></i></a>
                                </td>
                                <td class="text-nowrap"><?php echo showTime($c['created_at']); ?></td>
                            </tr>

                        <?php 
                            }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--content Area Start-->

<?php include "template/footer.php"; ?>
<script src="<?php echo $url; ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/chart_js/chart.min.js"></script>
<script>
    $('.counter-up').counterUp({
    delay: 10,
    time: 1000
});

//----------------------------visitors line chart---------------------------------
<?php 
    $dateArr = [];
    $visitorRate = [];
    $transitionRate = [];
    $today = date("Y-m-d");
    
    for($i=0;$i<10;$i++){
        $date = date_create($today);
        date_sub($date,date_interval_create_from_date_string("$i days"));
        $current = date_format($date,"Y-m-d");
        array_push($dateArr,$current);

        $result = countTotal("viewers","CAST(created_at AS DATE) = '$current'");
        array_push($visitorRate,$result);

        $result2 = countTotal("transition","CAST(created_at AS DATE) = '$current'");
        array_push($transitionRate,$result2);
    }
    

?>
//date 10 days DESC
let dateArr = <?php echo json_encode($dateArr); ?>;
//visitors per day
let viewerCountArr =  <?php echo json_encode($visitorRate); ?>;
let transitionArr = <?php echo json_encode($transitionRate); ?>;
let ov = document.getElementById('ov').getContext('2d');
let ovChart = new Chart(ov, {
    type: 'line',
    data: {
        labels: dateArr,
        datasets: [
            {
                label: 'Visitors Count',
                data: viewerCountArr,
                backgroundColor: [
                    '#007bff30',
                ],
                borderColor: [
                    '#007bff',
                ],
                borderWidth: 1,
                tension:0
            },
            {
                label: 'Transition Count',
                data: transitionArr,
                backgroundColor: [
                    '#D65DB130',
                ],
                borderColor: [
                    '#D65DB1',
                ],
                borderWidth: 1,
                tension:0
            }
            
        ]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridLines:[
                        {
                            display:false
                        }
                    ]
                }
            ]
        },
        legend:{
            display: true,
            shape:"circle",
            position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
});

//----------------------------category by post donut chart---------------------------------

<?php 
    $catName = [];
    $countPostByCategory = [];
    foreach(categories() as $c){
        array_push($catName,$c['title']);
        array_push($countPostByCategory,countTotal('posts',"category_id={$c['id']}"));
    }
    //php array to javascript array


?>

let catArr = <?php echo json_encode($catName); ?>;
let countArr = <?php echo json_encode($countPostByCategory); ?>;

let op = document.getElementById('op').getContext('2d');
let opChart = new Chart(op, {
    type: 'doughnut',
    data: {
        labels:catArr,
        datasets: [{
            label: '# of Votes',
            data: countArr,
            backgroundColor: [
                '#845EC280',
                '#D65DB180',
                '#FFC75F80',
                '#FF967180',
                '#00C9A780',
                '#936C0080',
                '#DAEEF780'
            ],
            borderColor: [
                '#845EC2',
                '#D65DB1',
                '#FFC75F',
                '#FF9671',
                '#00C9A7',
                '#936C00',
                '#DAEEF7'

                ,
                            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [
                {
                    display:false
                }
            ]
        },
        legend:{
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
});
</script>