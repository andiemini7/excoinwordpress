<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'cta_banner') {
            // $module_array = $module['cta_banner'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="cta_banner" class="container">
    <div class="cta_banner">
        <div class="cta_banner_icon">
            <img src="<?= get_template_directory_uri() ?>/images/bitcoin-convert.png">
        </div>
        <div class="cta_banner_base">
            <span class="cta_banner_base_ribbon"><?= $module['ribbon'] ;?></span>
            <span class="cta_banner_base_title"><?= $module['title'] ;?></span> 
            <span class="cta_banner_base_description"><?= $module['description'] ;?></span>
        </div>
        <a href="<?= $module['url'] ;?>" class="site_button">Action Button</a>
    </div>
</section>