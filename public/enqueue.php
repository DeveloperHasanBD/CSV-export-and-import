<?php

define('LAGMP_ADMIN_N_USER_ASSET', plugin_dir_url(__FILE__));
function lagmp_assets_enqueue()
{
    $slug = '';
    $css_loaded_page = ['csv-ex-imp', 'lagmap-admin-dashboard', 'state', 'country', 'shop'];
    $css_page = $_REQUEST['page'] ?? '';
    if (in_array($css_page, $css_loaded_page)) {
        wp_enqueue_style('lagmp-bootstrap-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/bootstrap.min.css', array(), null);
        wp_enqueue_style('lagmp-all-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/all.min.css', array(), null);
        wp_enqueue_style('lagmp-sweetalert-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/sweetalert.css', array(), null);
        wp_enqueue_style('lagmp-datatables-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/datatables.min.css', array(), null);
        wp_enqueue_style('lagmp-select2-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/select2.min.css', array(), null);
        wp_enqueue_style('lagmp-google-font-Montserrat', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');
        wp_enqueue_style('lagmp-style-css', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/style.css', array(), null);
    }

    // jss loaded

    $js_loaded_page = ['csv-ex-imp', 'lagmap-admin-dashboard', 'state', 'country', 'shop'];

    $js_page = $_REQUEST['page'] ?? '';
    if (in_array($js_page, $js_loaded_page)) {
        wp_enqueue_script('jquery');

        wp_enqueue_script('lagmp-bootstrap-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/bootstrap.min.js', array('jquery'), null, true);
        wp_enqueue_script('lagmp-all-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/all.min.js', array('jquery'), null, true);
        wp_enqueue_script('lagmp-sweetalert-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/sweetalert.min.js', array('jquery'), null, true);
        wp_enqueue_script('lagmp-datatables-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/datatables.min.js', array('jquery'), null, true);
        wp_enqueue_script('lagmp-select2-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/select2.min.js', array('jquery'), null, true);

        wp_enqueue_script('lagmp-validate-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/jquery.validate.min.js', array('jquery'), null, true);

        /*
           *  Ajax data processing
           */
        wp_enqueue_script('lagmp-custom-js', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/custom.js', array('jquery'), null, true);
        wp_localize_script('lagmp-custom-js', 'action_url_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }
}

add_action('admin_enqueue_scripts', 'lagmp_assets_enqueue');



function lagmp_front_end_assets()
{
    wp_enqueue_style('lagmp-map-style', LAGMP_ADMIN_N_USER_ASSET . 'assets/css/map-style.css');


    wp_enqueue_script('jquery');
    
    
    
     if (!is_user_logged_in()) {
        global $wpdb;
        $lagmp_api_table = $wpdb->prefix . 'lagmp_api';

        $api_result         = $wpdb->get_results("SELECT * FROM {$lagmp_api_table}");
        $is_api = '';
        foreach ($api_result as $api_key) {
            $is_api = $api_key->lamp_api;
        }
    ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $is_api ? $is_api : ''; ?>&callback=loadMap"></script>
<?php

    }


  
    
    
    
    
    
    wp_enqueue_script('lagmp-google-map', LAGMP_ADMIN_N_USER_ASSET . 'assets/js/google-map.js', array('jquery'), null, true);

    wp_localize_script('lagmp-google-map', 'action_url_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'lagmp_front_end_assets');