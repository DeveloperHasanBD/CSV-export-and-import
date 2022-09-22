<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=shop.csv');
global $wpdb;
$shop_details_table   = $wpdb->prefix . 'lagmp_shop_details';

$user_id                = '';
if (is_user_logged_in()) {
    $user_id = get_current_user_id();
}

$db_name    = $wpdb->dbname;
$servername = "localhost";
$username   = "root";
$password   = "";
$db         = $db_name;


// $servername = "localhost";
// $username   = "pintexre_PntxNew";
// $password   = "PntxNew12!@:";
// $db         = "pintexre_pintex_new";


$shops_query     = "SELECT * from {$shop_details_table}";
$con                = mysqli_connect($servername, $username, $password, $db);
$shops_result    = mysqli_query($con, $shops_query);


$output = fopen("php://output", "w");

fputcsv($output, array('ID', 'State', 'Country', 'Shop location', 'Lat', 'Long', 'Logo', 'Heading', 'Address #1', 'Address #2', 'Tell', 'Fax', 'Website', 'Email', 'Info #1', 'Info #2'));


while ($row = mysqli_fetch_assoc($shops_result)) {

    $data                   =  [];
    $data['id']             = $row['id'];
    $data['state_name']     = $row['state_name'];
    $data['country']        = $row['country'];
    $data['shop_location']  = $row['shop_location'];
    $data['lat_val']        = $row['lat_val'];
    $data['long_val']       = $row['long_val'];
    $data['logo_path']      = $row['logo_path'];
    $data['headline']       = $row['headline'];
    $data['adrs_line_one']  = $row['adrs_line_one'];
    $data['adrs_line_two']  = $row['adrs_line_two'];
    $data['tell']           = $row['tell'];
    $data['fax']            = $row['fax'];
    $data['website']        = $row['website'];
    $data['email']          = $row['email'];
    $data['info']           = $row['info'];
    $data['info_three']     = $row['info_three'];

    fputcsv($output, $data);
    // echo "<pre>";
    // print_r($data);
}
   
fclose($output);
exit();
