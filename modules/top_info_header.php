<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'top_info_header') {
            // $module_array = $module['top_info_header'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="top_info_header" class="container">
    <div class="top_info_header">
        <div class="top_info_header_up">
            <span class="top_info_header_up_title"><?= $module['top_title']; ?></span>
            <span class="top_info_header_up_description"><?= $module['top_description']; ?></span>
        </div>
        <div class="top_info_header_bottom">
            <div class="top_info_header_bottom_info">
                <span class="top_info_header_bottom_info_ribbon"><?= $module['ribbon']; ?></span>
                <span class="top_info_header_bottom_info_title"><?= $module['bottom_title']; ?></span>
                <span class="top_info_header_bottom_info_description"><?= $module['bottom_description']; ?></span>
            </div>
            <img src="<?= $module['image']; ?>"> 
        </div>
    </div> 
</section>