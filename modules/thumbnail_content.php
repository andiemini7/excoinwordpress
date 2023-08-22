<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'thumbnail_content') {
            // $module_array = $module['thumbnail_content'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="thumbnail_container" class="container">
    <div class="thumbnail_container">
        <img src="<?= $module['image']; ?>"> 
        <div class="thumbnail_container_body">
            <span class="thumbnail_container_body_ribbon"><?= $module['ribbon']; ?></span>
            <span class="thumbnail_container_body_header"><?= $module['title']; ?></span>
            <span class="thumbnail_container_body_content"><?= $module['description']; ?></span>
        </div>
    </div>
</section>