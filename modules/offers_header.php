<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'offers_header') {
            // $module_array = $module['offers_header'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="offers" class="container">
    <div class="offers">
        <div class="offers_header">
            <span class="offers_header_title"><?= $module['title']; ?></span>
            <span class="offers_header_description"><?= $module['description']; ?></span>
        </div>
        <div class="offers_base">
            <?php foreach($module['offers'] as $offer) : ?>
            <div class="offers_base_item">
                <img src="<?= $offer['image']; ?>">
                <span class="offers_base_item_text"><?= $offer['title']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>