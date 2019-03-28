<?php
	$markers = array();
	query_posts('post_type=stores&posts_per_page=-1');
	while ( have_posts() ) : the_post();
		$title = get_the_title();
		$map = get_field('map');
		$store_location = get_the_terms( get_the_id(), 'store_location' );
		$country = '';
		$state = '';

		foreach ($store_location as $item) {
			if ($item->parent) $state .= $item->name;
			else $country .= $item->name;
		}

		if(isset($map['lat'])) {
			$lat = $map['lat'];
		}
		if(isset($map['lng'])) {
			$long = $map['lng'];
		}
		if(isset($map['address'])) {
			$address = $map['address'];
		}

		$name = get_field('name');
		$phone = get_field('phone');
		$email = strtolower(get_field('email'));
		$website = strtolower(get_field('website'));
		// build list of all markers
		$markers[] = array(
			'center' => array(
				"lat" => $lat,
				"lng" => $long,
			),
			"title" => $title,
			"country" => $country,
			"state" => $state,
			'name' => $name,
			"address" => $address,
			"phone" => $phone,
			"email" => $email,
			"website" => $website,
	);
	endwhile;
	$args = array(
		"api_key" => "AIzaSyCLI3cT9LcczYAvF_trirgUGGfvhJJNhAs",
		"options" => array(
			"scrollwheel" => false,
			"draggable" => true,
			"disableDefaultUI" => false
		),
		"center" => array(
			"lat" => 0,
			"lng" => 25
		),
		'markers' => $markers
	);
?>
<section class="store-locator section">
	<div class="store-locator--container container small">
		<div class="store-locator--inputs">
			<label class="store-locator--inputs--location" for="location">
				<input type="text" name="location" value="" placeholder="Enter your country, suburb or postcode">
			</label>
		</div>
		<div class="store-locator--map" data-options='<?= json_encode($args['options']); ?>'>
			<?php foreach($args['markers'] as $marker): ?>
				<div class="store-locator--marker" data-center='<?= json_encode($marker['center']); ?>' data-country="<?= $marker['country'] ?>" data-state="<?= $marker['state'] ?>">
					<h4 class="store-locator--marker--title">
						<?=$marker['name'] . ' - ' . $marker['title']; ?>
					</h4>
					<?php foreach(array('address', 'phone', 'email', 'website') as $meta): ?>
						<?php if ($marker[$meta]): ?>
							<div class="store-locator--marker--meta">
								<span class="store-locator--marker--meta--heading"><?= $meta; ?></span>
								<?php $content = $marker[$meta]; ?>
								<?php $content = $meta === 'email' ? '<a href="mailto:' . $marker[$meta] . '">Send email</a>' : $content; ?>
								<?php $content = $meta === 'website' ? '<a target="_blank" href="' . ($marker[$meta]) . '">Visit site</a>' : $content; ?>
								<span class="store-locator--marker--meta--content"><?= $content; ?></span>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="store-locator--results"></div>
</section>

<section class="section">
	<div class="store-locator--results-custom container small">
		<?php
		$orderedMarkers = array();

		foreach ($markers as &$marker) {
			$country = $marker['country'];
			$state = $marker['state'];

			$orderedMarkers[$country][$state][] = $marker;
		}

		ksort($orderedMarkers);
		foreach ($orderedMarkers as &$arr) {
			ksort($arr);
		}

		foreach ($orderedMarkers as $country => $states) : ?>
			<h3><?= $country ?></h3>
			<div class="locations-grid">
				<div class="locations-grid-sizer"></div>
				<?php foreach ($states as $state => $locations): ?>
					<div class="locations-grid-item">
						<h4><?= $state ?></h4>
						<?php foreach ($locations as $location) : ?>
						<div>
							<p>
								<strong><?= $location['name'] ?></strong>
								<?php if (!empty($location['address'])) : ?>
								<span><?= $location['address'] ?></span>
								<?php endif; ?>
								<?php if (!empty($location['phone'])) : ?>
								<span>
									<a href="tel:<?= str_replace(' ', '', $location['phone']) ?>">Tel: <?= $location['phone'] ?></a>
								</span>
								<?php endif; ?>
								<?php if (!empty($location['email'])) : ?>
									<span>
										<a href="mailto:<?= $location['email'] ?>"><?= $location['email'] ?></a>
									</span>
								<?php endif; ?>
								<?php if (!empty($location['website'])) : ?>
								<span>
									<a href="mailto:<?= $location['website'] ?>" target="_blank"><?= $location['website'] ?></a>
								</span>
								<?php endif; ?>
							</p>
						</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach;?>
	</div>
</section>
