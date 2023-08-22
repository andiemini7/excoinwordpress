<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'batm_locations') {
            // $module_array = $module['batm_locations'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="batm_locations" class="batm_locations">
    <div class="container batm_locations_body">
        <div class="batm_locations_body_info">
            <div class="batm_locations_body_info_select">
                <span class="batm_locations_body_info_select_title"><?= $module['title']; ?></span>
                <span class="batm_locations_body_info_select_description"><?= $module['description']; ?></span>
                <select id="batm_locations_body_info_select_field">
                    <option value="prishtine" selected>Prishtine</option>
                </select>
            </div>
            <div class="batm_locations_body_info_addresses">
                <?php foreach($module['address'] as $address) : ?>
                    <div class="address">
                        <span class="address_title"><?= $address['title']; ?></span>
                        <span class="address_description"><?= $address['description']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <img src="<?= $module['image']; ?>"> 
    </div>
</section>