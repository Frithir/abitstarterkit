<?php
// Register a custom menu page.

function register_documentation(){
    add_menu_page(
        __( 'Documentation', 'textdomain' ),
        'Documentation',
        'manage_options',
        'custompage',
        'documentation',
  		'dashicons-format-aside',
		3
    );
}
add_action( 'admin_menu', 'register_documentation' );

// Display a custom menu page
function documentation() {
	echo '<style media="screen">
		.docs {
			width: 90%;
			height: 100%;
			padding-bottom: 105%;
		}
		iframe {
			position: absolute;
			top:0;
			left: 0;
			width: 100%;
			height: 100%;
		}
	</style>
	<div class="docs">
		<iframe src="/docs/" width="100%" height="100%"></iframe>
	</div>';
}
