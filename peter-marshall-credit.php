<?php
/*
Plugin Name:  Designed by Peter Marshall
Description:  Adds a credit banner to the dashboard landing page.
Version:      0.1
Author:       Peter Marshall
Author URI:   https://petermarshall.ca
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

define( 'PM_CREDIT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action('wp_dashboard_setup', 'pm_credit_add_dashboard_widgets');

function pm_credit_add_dashboard_widgets() {
        global $wp_meta_boxes;
        add_meta_box('pm_credit_widget', 'Designed by Peter Marshall', 'pm_credit_widget_credits', 'dashboard', 'side', 'high');
}

function pm_credit_widget_credits() {
?>
<style>
#pm_credit_widget .postbox-header {
display: none;
}
#pm_credit_widget .inside {
margin: 0;
padding: 0;
}
#pm_credit_widget a {
display: flex;
}
#pm_credit_widget img {
width: 100%;
height: auto;
-webkit-user-drag: none;
}
</style>
<a href="https://petermarshall.ca/" target="_blank"><img src="<?php echo PM_CREDIT_PLUGIN_URL . 'assets/petermarshall-glowing-cube-wordmark.avif' ?>" /></a>
<?php
}
