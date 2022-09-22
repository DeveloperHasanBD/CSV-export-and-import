<?php
global $wpdb;

/**
 * 
 * start csv exporter file 
 * 
 */

$post_table = $wpdb->prefix . 'posts';
$is_exist_csv_ex_page = $wpdb->get_row("SELECT * FROM $post_table WHERE post_type = 'page' AND post_status='publish' AND post_name='csv-shop-eporter'");

if ($is_exist_csv_ex_page) {
} else {
    $csv_exporter_page = [];
    $csv_exporter_page['post_title']    = 'CSV Shop Exporter';
    $csv_exporter_page['post_status']   = 'publish';
    $csv_exporter_page['post_name']     = 'csv-shop-eporter';
    $csv_exporter_page['post_type']     = 'page';
    wp_insert_post($csv_exporter_page);
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

$post_table = $wpdb->prefix . 'posts';
$is_exist_csv_ex_page = $wpdb->get_row("SELECT * FROM $post_table WHERE post_type = 'page' AND post_status='publish' AND post_name='csv-country-eporter'");

if ($is_exist_csv_ex_page) {
} else {
    $csv_exporter_page = [];
    $csv_exporter_page['post_title']    = 'CSV Country Exporter';
    $csv_exporter_page['post_status']   = 'publish';
    $csv_exporter_page['post_name']     = 'csv-country-eporter';
    $csv_exporter_page['post_type']     = 'page';
    wp_insert_post($csv_exporter_page);
}
/**
 * 
 * End csv country exporter file 
 * 
 */

/**
 * 
 * start csv state exporter file 
 * 
 */

$post_table = $wpdb->prefix . 'posts';
$is_exist_csv_ex_page = $wpdb->get_row("SELECT * FROM $post_table WHERE post_type = 'page' AND post_status='publish' AND post_name='csv-state-eporter'");

if ($is_exist_csv_ex_page) {
} else {
    $csv_exporter_page = [];
    $csv_exporter_page['post_title']    = 'CSV State Exporter';
    $csv_exporter_page['post_status']   = 'publish';
    $csv_exporter_page['post_name']     = 'csv-state-eporter';
    $csv_exporter_page['post_type']     = 'page';
    wp_insert_post($csv_exporter_page);
}
/**
 * 
 * End csv state exporter file 
 * 
 */



$lagmp_api             = $wpdb->prefix . 'lagmp_api';
$lagmp_api_table_query = "CREATE TABLE {$lagmp_api} (
    id INT (11) NOT NULL AUTO_INCREMENT,
    lamp_api VARCHAR (255),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)
)";

$lagmp_state             = $wpdb->prefix . 'lagmp_states';
$lagmp_state_table_query = "CREATE TABLE {$lagmp_state} (
    id INT (11) NOT NULL AUTO_INCREMENT,
    state_name VARCHAR (255),
    state_lat VARCHAR (255),
    state_long VARCHAR (255),
    state_lat_n_long VARCHAR (255),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)
)";

$lagmp_country             = $wpdb->prefix . 'lagmp_countries';
$lagmp_country_table_query = "CREATE TABLE {$lagmp_country} (
    id INT (11) NOT NULL AUTO_INCREMENT,
    state_name VARCHAR (255),
    country_name VARCHAR (255),
    country_lat VARCHAR (255),
    country_lng VARCHAR (255),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)
)";

$lagmp_shop_details_table = $wpdb->prefix . 'lagmp_shop_details';
$lagmp_shop_query = "CREATE TABLE {$lagmp_shop_details_table} (
    id INT (11) NOT NULL AUTO_INCREMENT,
    state_name VARCHAR (255),
    country VARCHAR (255),
    lat_val VARCHAR (255),
    long_val VARCHAR (255),
    shop_location VARCHAR (255),
    logo_path VARCHAR (255),
    headline VARCHAR (255),
    adrs_line_one VARCHAR (255),
    adrs_line_two VARCHAR (255),
    tell VARCHAR (255),
    fax VARCHAR (255),
    website VARCHAR (255),
    email VARCHAR (255),
    info VARCHAR (255),
    info_three VARCHAR (255),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)
)";


require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta($lagmp_api_table_query);
dbDelta($lagmp_state_table_query);
dbDelta($lagmp_country_table_query);
dbDelta($lagmp_shop_query);
