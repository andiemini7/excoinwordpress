<?php 

$footer_settings = get_field('footer_settings', 'options'); 
$top_footer_settings = get_field('top_footer_section', 'options'); 
?>
<section id="footer_location" class="footer_location">
<div class="container footer_location_body">
	<div class="footer_location_body_info">
		<span class="footer_location_body_info_title"><?= $top_footer_settings['title']; ?></span>
		<span class="footer_location_body_info_description"><?= $top_footer_settings['description']; ?></span> 
		<div class="footer_location_body_info_checkpoints">
			<?php foreach($top_footer_settings['checkpoints'] as $check) : ?>
				<div class="checkpoint">
					<img src="<?= get_template_directory_uri() ?>/images/check_circle.png">
					<span class="checkpoint_text"><?= $check['checkpoint']; ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="footer_location_body_locations">
		<select id="footer_location_body_locations_select">
            <option value="prishtine" selected>Prishtine</option>
        </select>
		<div class="footer_location_body_locations_address">
			<span class="footer_location_body_locations_address_title">Address</span>
			<span class="footer_location_body_locations_address_description"><?= $top_footer_settings['address']; ?></span>
		</div>
		<div class="footer_location_body_locations_phone">
			<span class="footer_location_body_locations_phone_title">Phone number</span>
			<span class="footer_location_body_locations_phone_description"><?= $top_footer_settings['phone_number']; ?></span>
		</div>
		<div class="footer_location_body_locations_date">
			<div class="footer_location_body_locations_date_week">
				<span class="footer_location_body_locations_date_week_title">Mon-Fri</span>
				<span class="footer_location_body_locations_date_week_description">08:00-20:00</span>
			</div>
			<div class="footer_location_body_locations_date_week">
				<span class="footer_location_body_locations_date_week_title">Saturday</span>
				<span class="footer_location_body_locations_date_week_description">08:00-14:00</span>
			</div>
		</div>
	</div>
	<img src="<?= $top_footer_settings['image']; ?>"> 
</div>
</section>

<footer class="footer">
	<div class="container footer_container">
		<img class="footer_container_img" src="<?= get_template_directory_uri() ?>/images/footer_logo.png" alt="logo"/>
		<div class="footer_container_socials">
			<?php foreach($footer_settings['social_media'] as $socials) : ?>
				<a href="<?= $socials['link']; ?>">
					<img src="<?= $socials['icon']; ?>" alt="logo"/>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="footer_container_menu">
			<span class="footer_container_menu_title">Links</span>
			<div class="footer_container_menu_links">
			<?php
                    wp_nav_menu([
                        'theme_location' => 'secondary',
                        'depth' => '1',
                    ]);
                 ?>
			</div>
		</div>
		<div class="footer_container_address">
			<span class="footer_container_address_title">Main office</span>
			<span class="footer_container_address_description"><?= $footer_settings['main_office']; ?></span>
		</div>
	</div>
	<div class="container footer_privacy">
		<span class="footer_privacy_section">
			<?= $footer_settings['copyright_text']; ?>
		</span>
		<div class="footer_privacy_links">
			<a href="<?= $footer_settings['privacy_policy_url']; ?>">Privacy Policy</a>
			<a href="<?= $footer_settings['terms_and_conditions_url']; ?>">Terms and Conditions</a>
		</div>
	</div> 
</footer>

	<?php wp_footer(); ?>
	
	</body>
</html>