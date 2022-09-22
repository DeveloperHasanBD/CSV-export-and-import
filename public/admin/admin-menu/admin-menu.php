<?php

function lagmp_custom_admin_menu()
{
	add_menu_page(
		__('GMAP Admin', 'lagmap'),
		__('GMAP Admin', 'lagmap'),
		'manage_options',
		'lagmap-admin-dashboard',
		'lagmp_dashboard_content',
		'dashicons-location',
		5
	);
	
	add_submenu_page(
		'lagmap-admin-dashboard',
		__('GMAP Dashboard', 'lagmap'),
		__('GMAP Dashboard', 'lagmap'),
		'manage_options',
		'lagmap-admin-dashboard',
		'lagmp_dashboard_content',
		'dashicons-location'
	);
	
	add_submenu_page(
		'lagmap-admin-dashboard',
		__('State', 'lagmap'),
		__('State', 'lagmap'),
		'manage_options',
		'state',
		'lagmp_state_content'
	);
	
	add_submenu_page(
		'lagmap-admin-dashboard',
		__('Country', 'lagmap'),
		__('Country', 'lagmap'),
		'manage_options',
		'country',
		'lagmp_country_content'
	);
	
	add_submenu_page(
		'lagmap-admin-dashboard',
		__('Shop', 'lagmap'),
		__('Shop', 'lagmap'),
		'manage_options',
		'shop',
		'lagmp_shop_content'
	);
	
	add_submenu_page(
		'lagmap-admin-dashboard',
		__('CSV', 'lagmap'),
		__('CSV Export/Import', 'lagmap'),
		'manage_options',
		'csv-ex-imp',
		'lagmp_csv_export'
	);

}
add_action('admin_menu', 'lagmp_custom_admin_menu');
