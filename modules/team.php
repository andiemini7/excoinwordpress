<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'team') {
            // $module_array = $module['team'];
            unset($modules[$key]);
            break;
        }
    }
?>
<section id="team" class="container team_container">
    <span class="team_title"><?= $module['title']; ?></span>
    <div class="team">
        <?php foreach($module['member'] as $member) : ?>
        <div class="team_member">
            <img src="<?= $member['image']; ?>"> 
            <span class="team_member_name"><?= $member['name']; ?></span>
            <span class="team_member_position"><?= $member['position']; ?></span>
        </div>
    <?php endforeach; ?>
    </div>
</section>