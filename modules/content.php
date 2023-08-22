<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'content') {
            $module_array = $module['content'];
            unset($modules[$key]);
            break;
        }
    }
?>

<div class="content container module-container">
    <?php if (!empty($module_array)) :
        echo $module_array;
    endif; ?>
</div>