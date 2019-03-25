<footer class="footer section">
	<div class="container flex">
		<?php wp_nav_menu(array('container' => false )); ?>
		<?php // get_template_part( 'components/footer' ); ?>
	</div>
</footer>
<section class="copy">
	<div class="container flex">
		<p>&copy; <?php echo date('Y'); ?> All rights Reserved.</p>
		<p><a target="_blank" href="https://thriveweb.com.au/" title="Web Design Gold Coast" >Web Design Gold Coast</a> - THRIVE</p>
	</div>
</section>

</div>

<?php wp_footer(); ?>

</body>
</html>
