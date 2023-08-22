<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'checkpoints_header') {
            // $module_array = $module['checkpoints_header'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="checkpoints_header" class="container">
    <div class="checkpoints_header"> 
        <img class="checkpoints_header_img" src="<?= $module['image'] ;?>"> 
        <div class="checkpoints_header_info">
            <span class="checkpoints_header_info_title"><?= $module['title'] ;?></span>
            <span class="checkpoints_header_info_description"><?= $module['description'] ;?></span>
            <div class="checkpoints">
                <?php foreach($module['checkpoints'] as $checkpoint) : ?>
                <div class="checkpoint">
                    <img src="<?= get_template_directory_uri() ?>/images/check_circle.png">
                    <span class="checkpoint_text"><?= $checkpoint['checkpoint']; ?></span>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</section>