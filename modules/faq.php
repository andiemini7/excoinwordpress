<?php
$module_array = [];
foreach ($modules as $key => $module) {
    if ($module['acf_fc_layout'] == 'faq') {
        // $module_array = $module['faq'];
        unset($modules[$key]);
        break;
    }
}
?>
<section id="faq" class="container">
    <div class="faq">
        <h1><?= $module['title']; ?></h1>
        <?php foreach($module['questions_and_answers'] as $qa) : ?>
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <?= $qa['question']; ?> <span class="toggle-symbol">+</span>
            </div>
            <div class="faq-answer">
                <?= $qa['answer']; ?>
            </div>
        </div>
        <?php endforeach; ?>
</section>