<?php
function scrape_insta($username) {
	$insta_source = file_get_contents('https://instagram.com/'.$username.'/?__1-a');
	$insta_array = json_decode($insta_source, TRUE);
	$latest_array = $insta_array['items'];
	return $latest_array;
}

?>
<div class="instagram-banner--section">
	<?php
	$instagram = explode('/', get_field( 'instagram_feed_link', 'options' ));
	$account = $instagram[count($instagram) - 2];
	$account = $account ? $account : 'instagram';
	$number = 4;
	?>
	<h3 class="instagram-banner--title sans-serif">
		<a target="_blank"
		href="https://instagram.com/<?php echo $account; ?>">
		<span class="title">Follow us on</span>
		<span class="account">@<?php echo $account; ?></span>
	</a>
</h3>
<div class="flex lazy-parent">
	<?php
	$results = scrape_insta($account);
	$count = 0;
	foreach ($results as $item) :
		$count++;
		if($count >= $number){ continue; }
		?>
		<a target="_blank" class="instagram-banner--item lazy-child" href="<?= $item['link']; ?>" style="background-image: url(<?= $item['images']['standard_resolution']['url'] ?>)"></a>
	<?php endforeach; ?>
</div>
<a class="button" target="_blank" href="https://instagram.com/<?php echo $account; ?>">follow</a>
</div>
