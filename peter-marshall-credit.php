<?php
/*
Plugin Name:  Designed by Peter Marshall
Description:  Adds a credit banner to the dashboard landing page.
Version:      0.1.1
Author:       Peter Marshall
Author URI:   https://petermarshall.ca
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/petm5/peter-marshall-credit/',
	__FILE__,
	'peter-marshall-credit'
);

$myUpdateChecker->setBranch('main');

add_action('wp_dashboard_setup', 'pm_credit_add_dashboard_widgets');

function pm_credit_add_dashboard_widgets() {
        global $wp_meta_boxes;
        add_meta_box('pm_credit_widget', 'Designed by Peter Marshall', 'pm_credit_widget_credits', 'dashboard', 'side', 'high');
}

function pm_credit_widget_credits() {
	?>
	<div class="pm-credit-wrapper hndle">
		<a href="https://petermarshall.ca/" target="_blank">
			<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/petermarshall-glowing-cube-wordmark.avif' ) ?>" alt="Logo" />
		</a>
	</div>
	<?php
}

add_action('admin_head', 'pm_credit_widget_admin_styles');
function pm_credit_widget_admin_styles() {
    $screen = get_current_screen();
    if ( $screen && $screen->id === 'dashboard' ) {
        ?>
        <style>
			#pm_credit_widget .postbox-header {
				display: none;
			}
			#pm_credit_widget {
				cursor: move;
			}
			#pm_credit_widget .inside {
				margin: 0;
				padding: 0;
			}
			#pm_credit_widget a {
				display: flex;
				cursor: unset;
			}
			#pm_credit_widget img {
				width: 100%;
				height: auto;
				-webkit-user-drag: none;
			}
        </style>
        <?php
    }
}
