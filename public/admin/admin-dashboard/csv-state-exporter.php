<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=state.csv');
global $wpdb;
$lagmp_states_table   = $wpdb->prefix . 'lagmp_states';

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


$states_query     = "SELECT * from {$lagmp_states_table}";
$con                = mysqli_connect($servername, $username, $password, $db);
$states_result    = mysqli_query($con, $states_query);


$output = fopen("php://output", "w");

fputcsv($output, array('ID', 'State', 'Lat', 'Long', "Selected Lat Long"));

while ($row = mysqli_fetch_assoc($states_result)) {

    $data                         =  [];
    $data['id']                   = $row['id'];
    $data['state_name']           = $row['state_name'];
    $data['state_lat']            = $row['state_lat'];
    $data['state_long']           = $row['state_long'];
    $data['state_lat_n_long']     = $row['state_lat_n_long'];

    fputcsv($output, $data);
    // echo "<pre>";
    // print_r($data);
}

fclose($output);
exit();
