<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'value_info') {
            // $module_array = $module['value_info'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="value_info" class="value_info">
    <div class="container value_info_base">
        <div class="value_info_base_volume">
            <span class="title"><?= $module['volume_traded']; ?></span>
            <span class="description">Quarterly volume traded</span>
        </div>
        <div class="value_info_base_countries">
            <span class="title"><?= $module['countries_supported']; ?></span>
            <span class="description">Countries supported</span>
        </div>
        <div class="value_info_base_assets">
            <span class="title"><?= $module['assets_on_platform']; ?></span>
            <span class="description">Assets on platform</span>
        </div>
    </div>
</section>