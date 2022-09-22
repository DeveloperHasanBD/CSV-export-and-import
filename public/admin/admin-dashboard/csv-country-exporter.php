<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=country.csv');
global $wpdb;
$lagmp_countries_table   = $wpdb->prefix . 'lagmp_countries';

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


$country_query     = "SELECT * from {$lagmp_countries_table}";
$con                = mysqli_connect($servername, $username, $password, $db);
$countries_result    = mysqli_query($con, $country_query);


$output = fopen("php://output", "w");

fputcsv($output, array('ID', 'State', 'Country', 'Lat', 'Long'));

while ($row = mysqli_fetch_assoc($countries_result)) {

    $country_csv                   =  [];
    $country_csv['id']             = $row['id'];
    $country_csv['state_name']     = $row['state_name'];
    $country_csv['country_name']   = $row['country_name'];
    $country_csv['country_lat']    = $row['country_lat'];
    $country_csv['country_lng']    = $row['country_lng'];

    fputcsv($output, $country_csv);
    // echo "<pre>";
    // print_r($country_csv);
}
   
fclose($output);
exit();
