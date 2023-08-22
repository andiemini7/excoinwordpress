<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'review_header') {
            // $module_array = $module['review_header'];
            unset($modules[$key]);
            break;
        }
    }
?>

<section id="review_header" class="container">
    <div class="review_header">
        <div class="review_header_base">
            <span class="review_header_base_title"><?= $module['title'] ;?></span>
            <span class="review_header_base_description"><?= $module['description'] ;?></span>
            <a href="<?= $module['url'] ;?>" class="site_button">Get Started</a>
        </div>
        <div class="review_header_image">
            <img src="<?= $module['image'] ;?>">
        </div>    
    </div>
</section>