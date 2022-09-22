<?php

/**
 * Plugin Name:       Custom Pointer
 * Plugin URI:        https://www.fiverr.com/wp_expert42
 * Description:       Custom Pointer
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Developer Hasan Mahmud
 * Author URI:        https://www.fiverr.com/wp_expert42
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-pointer
 * Domain Path:       /languages
 */

define('LAGMP_TEMPLATE_PATH', plugin_dir_path(__FILE__));
// Assets link enqueue 
require_once(LAGMP_TEMPLATE_PATH . 'public/enqueue.php');


// Admin dashboard content 
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-menu/admin-menu.php');
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/admin-dashboard.php');
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/state.php');
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/country.php');
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/shop.php');
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/csv-importer.php');



// functionality 
require_once(LAGMP_TEMPLATE_PATH . 'public/admin/functionality/ajax-data-processing.php');

function lagmp_front_end_view()
{
    require_once(LAGMP_TEMPLATE_PATH . 'public/users/map-view.php');
}
add_shortcode('custom_gmap', 'lagmp_front_end_view');


function lagmap_db_table_generate()
{
    require_once(LAGMP_TEMPLATE_PATH . 'public/inc/db-table.php');
}
register_activation_hook(__FILE__, 'lagmap_db_table_generate');



/**
 * 
 * start csv exporter file 
 * 
 */


add_filter('page_template', 'lagmp_csv_exporter_page_template');
function lagmp_csv_exporter_page_template()
{
    global $post;
    if ($post->post_name == 'csv-shop-eporter') {
        require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/csv-shop-exporter.php');
        die;
    }
}

/**
 * 
 * End csv exporter file 
 * 
 */

/**
 * 
 * start csv country exporter file 
 * 
 */


add_filter('page_template', 'lagmp_csv_cntry_exporter_page_template');
function lagmp_csv_cntry_exporter_page_template()
{
    global $post;
    if ($post->post_name == 'csv-country-eporter') {
        require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/csv-country-exporter.php');
        die;
    }
}

/**
 * 
 * End csv country exporter file 
 * 
 */

/**
 * 
 * start csv country exporter file 
 * 
 */


add_filter('page_template', 'lagmp_csv_state_exporter_page_template');
function lagmp_csv_state_exporter_page_template()
{
    global $post;
    if ($post->post_name == 'csv-state-eporter') {
        require_once(LAGMP_TEMPLATE_PATH . 'public/admin/admin-dashboard/csv-state-exporter.php');
        die;
    }
}

/**
 * 
 * End csv country exporter file 
 * 
 */