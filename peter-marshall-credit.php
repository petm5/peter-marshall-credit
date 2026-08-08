<?php
/*
Plugin Name:  Designed by Peter Marshall
Description:  Adds a credit banner to the dashboard landing page.
Version:      0.1.4
Author:       Peter Marshall
Author URI:   https://petermarshall.ca
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

require __DIR__ . '/vendor/autoload.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/petm5/peter-marshall-credit/',
	__FILE__,
	'peter-marshall-credit'
);

add_action('wp_dashboard_setup', 'pm_credit_add_dashboard_widgets');

function pm_credit_add_dashboard_widgets() {
        global $wp_meta_boxes;
        add_meta_box('pm_credit_widget', 'Designed by Peter Marshall', 'pm_credit_widget_credits', 'dashboard', 'side', 'high');
}

function pm_credit_widget_credits() {
	?>
	<div class="pm-credit-wrapper hndle">
		<div class="pm-credit-bg-section">
			<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/petermarshall-glowing-cube-wordmark.avif?v=3' ) ?>" alt="Logo" />
		</div>
		<div class="pm-credit-overlay-button-section">
			<a class="pm-credit-button" href="https://petermarshall.ca/" target="_blank">Proudly designed by Peter Marshall</a>
		</div>
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
			#pm_credit_widget .pm-credit-wrapper {
				position: relative;
				display: grid;
				grid-template-rows: 3fr 2fr;
				grid-template-columns: 1fr;
				width: 100%;
				.pm-credit-bg-section {
					grid-row: 1 / -1;
				    grid-column: 1;
				}
				.pm-credit-overlay-button-section {
					grid-row: 2;
				    grid-column: 1;
				    justify-self: center;
					align-self: center;
				}
			}
			#pm_credit_widget a {
				display: flex;
			}
			#pm_credit_widget img {
				width: 100%;
				height: auto;
				display: block;
				-webkit-user-drag: none;
			}
			#pm_credit_widget .pm-credit-button {
				background-color: #6060604a;
				color: #f7f7f7;
				text-shadow: 0 0 8px #000a;
				padding: 0.7em 1.1em;
				border-radius: 2rem;
				box-shadow: 0 0 2rem #0002, 0 0 .5rem #0001;
				border: 1.3px solid #67676761;
				text-decoration: none;
				font-weight: 500;
				font-size: clamp(0.9rem, 4.4vw, 1.4rem);
				font-family: Cantarell;
				backdrop-filter: blur(5px);
			}
        </style>
        <?php
    }
}
