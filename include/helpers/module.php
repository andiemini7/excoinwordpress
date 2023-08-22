<?php
    $modules = get_field('modules');
    // var_dump($modules);
    if( have_rows('modules') ):
        while ( have_rows('modules') ) : the_row();
            include (get_template_directory().'/modules/'.get_row_layout().'.php');
        endwhile;
    endif;
?>