<div class="card shadow-sm mb-4 post-card">
    <div class="card-body">
        <a href="detail.php?id=<?php echo $p['id']; ?>">
            <h4><?php echo $p['title']; ?></h4>
        </a>
        <div class="my-3">
            <i class="feather-user text-danger mr-2"></i>
            <?php echo user($p['user_id'])['name']; ?>
            <i class="feather-layers text-primary ml-3 mr-2"></i>
            <?php echo category($p['category_id'])['title']; ?>
            <i class="feather-user text-success ml-3 mr-2""></i>
            <?php echo date("j M Y",strtotime($p['created_at'])); ?>
        </div>
        <p class="text-black-50"><?php echo short(strip_tags(html_entity_decode($p['description'])),'200'); ?></p>
    </div>
</div>