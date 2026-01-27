<?php
/*
Plugin Name:  Cheesecake
Plugin URI:   https://petermarshall.ca
Description:  Cheesy enhancements for your WordPress dashboard.
Version:      0.3
Author:       Peter Marshall
Author URI:   https://petermarshall.ca
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  cheesecake
Domain Path:  /languages
*/

define( 'CHEESECAKE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'admin_enqueue_scripts', 'enqueue_admin_custom_css' );

function enqueue_admin_custom_css() {
        wp_enqueue_style( 'admin-custom', CHEESECAKE_PLUGIN_URL . 'css/admin-custom.css?r=2' );
}

add_action('wp_dashboard_setup', 'cheesecake_add_dashboard_widgets');

function cheesecake_add_dashboard_widgets() {
        global $wp_meta_boxes;
        add_meta_box('cheesecake_widget', 'Credits: Peter Marshall', 'cheesecake_widget_credits', 'dashboard', 'side', 'high');
}

function cheesecake_widget_credits() {
?>
<style>
#cheesecake_widget .postbox-header {
display: none;
}
#cheesecake_widget .inside {
margin: 0;
padding: 0;
}
#cheesecake_widget a {
display: flex;
}
#cheesecake_widget img {
width: 100%;
height: auto;
-webkit-user-drag: none;
}
</style>
<a href="https://petermarshall.ca/" target="_blank"><img src="<?php echo CHEESECAKE_PLUGIN_URL . 'assets/petermarshall-terminal-wordmark.avif' ?>" /></a>
'<?php
}
