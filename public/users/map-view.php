<?php
global $wpdb;


$lagmp_shop_details_table = $wpdb->prefix . 'lagmp_shop_details';
$lagmp_api_table = $wpdb->prefix . 'lagmp_api';

function get_states_name()
{
    global $wpdb;
    $lagmp_states_table = $wpdb->prefix . 'lagmp_states';
    $results    = $wpdb->get_results("SELECT * FROM $lagmp_states_table");
    foreach ($results as $items) {
        $item = $items->state_name;
        $state_lat = $items->state_lat;
        $state_long = $items->state_long;
?>
        <!-- <option value="<?php //echo strtolower($item); 
                            ?>"><?php //echo ucwords($item); 
                                ?></option> -->
        <option value="<?php echo $state_lat . '|' . $state_long; ?>"><?php echo ucwords($item); ?></option>
<?php
    }
}

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <img id="get_marker" class="d-none" src="<?php echo plugin_dir_url(''); ?>lagmap/public/assets/images/marker.png" alt="">

    <div class="lagmp_area">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="lagmp_menu">
                        <select name="select_state" id="lagmp_front_end_states" class="select_state get_country_bt_state form-control">
                            <option value="34.0479|100.6197">Select state</option>
                            <?php get_states_name(); ?>
                        </select>

                        <div class="pointed_country_fd">
                            <select name="select_country" id="get_pointed_countries" class="get_shop_from_inner_country select_country form-control mt-4">
                            </select>
                        </div>

                        <div id="different_location_sp" class="pointed_shop_inner_country">
                            <select name="shop_inner_country" id="get_pointed_shop_inner_country" class="form-control mt-4">
                            </select>
                        </div>


                    </div>
                </div>
                <div class="col-9">
                    <div id="pointed_countries"></div>
                    <?php

                    $get_all_shop_results    = $wpdb->get_results("SELECT * FROM $lagmp_shop_details_table");
                    $get_shops_results = json_encode($get_all_shop_results, true);

                    ?>
                    <div id="get_all_shops"><?php echo $get_shops_results; ?></div>
                    <div class="map_box">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $api_result         = $wpdb->get_results("SELECT * FROM {$lagmp_api_table}");
    $is_api = '';
    foreach ($api_result as $api_key) {
        $is_api = $api_key->lamp_api;
    }
    ?>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $is_api ? $is_api : ''; ?>&callback=loadMap"></script>

</body>

</html>