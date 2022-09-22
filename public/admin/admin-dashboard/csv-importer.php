<?php

function lagmp_csv_export()
{
    global $wpdb;
    $lagmp_api_table = $wpdb->prefix . 'lagmp_api';
    $shop_details_table   = $wpdb->prefix . 'lagmp_shop_details';
    $slagmp_countries_table   = $wpdb->prefix . 'lagmp_countries';
    $lagmp_states_table   = $wpdb->prefix . 'lagmp_states';

    $csv_shop_exporter = site_url() . '/csv-shop-eporter';
    $csv_country_eporter = site_url() . '/csv-country-eporter';
    $csv_state_eporter = site_url() . '/csv-state-eporter';
    wp_enqueue_media();

    $db_name    = $wpdb->dbname;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $db         = $db_name;



    // $shops_query     = "SELECT * from {$shop_details_table}";
    // $con                = mysqli_connect($servername, $username, $password, $db);
    // $shops_result    = mysqli_query($con, $shops_query);




?>

    <div class="mt-3 shadow p-3 mb-3 bg-body rounded user-dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mt-3 shadow p-3 mb-3 bg-body rounded">
                        <h2>Welcome to CSV Exporter and Importer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="csv_exporter_btn shadow p-3 mb-5 bg-body rounded  text-center">
                        <h4 class="mb-4">Download state CSV</h4>
                        <div class="export_csv_btn">
                            <a class="btn btn-info" href="<?php echo $csv_state_eporter; ?>">Download State CSV</a>
                        </div>
                    </div>
                    <div class="csv_exporter_btn shadow p-3 mb-5 bg-body rounded  text-center">
                        <h4 class="mb-4">Download country CSV</h4>
                        <div class="export_csv_btn">
                            <a class="btn btn-info" href="<?php echo $csv_country_eporter; ?>">Download Country CSV</a>
                        </div>
                    </div>
                    <div class="csv_exporter_btn shadow p-3 mb-5 bg-body rounded  text-center">
                        <h4 class="mb-4">Download shop CSV</h4>
                        <div class="export_csv_btn">
                            <a class="btn btn-info" href="<?php echo $csv_shop_exporter; ?>">Download Shop CSV</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="import_csv shadow p-3 mb-5 bg-body rounded">
                        <h4>Upload state CSV </h4>
                        <?php
                        $st_csv_submit_btn = $_POST['st_csv_submit_btn'] ?? '';
                        if ('Upload State CSV' == $st_csv_submit_btn) {


                            $allowed_file_type = array('csv');
                            $filename = $_FILES['state_csv_file']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            if (in_array($ext, $allowed_file_type)) {
                                $handle = fopen($_FILES['state_csv_file']['tmp_name'], "r");
                                while (($data = fgetcsv($handle)) !== FALSE) {
                                    $wpdb->insert(
                                        $lagmp_states_table,
                                        [
                                            'id'                => $data[0],
                                            'state_name'        => $data[1],
                                            'state_lat'         => $data[2],
                                            'state_long'        => $data[3],
                                            'state_lat_n_long'  => $data[4],
                                        ]
                                    );
                                }
                        ?>
                                <div class="alert alert-success">
                                    <strong>Successfully!</strong> Imported CSV file
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Please</strong> Upload only CSV file
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <form id="state_csv_file_importer" enctype='multipart/form-data' action='' method='post'>
                            <label>Upload CSV file</label>

                            <input class="form-control" type='file' name='state_csv_file'>
                            <input class="form-control mt-4 btn btn-info" type="submit" value="Upload State CSV" name="st_csv_submit_btn">
                        </form>

                    </div>
                    <div class="import_csv shadow p-3 mb-5 bg-body rounded">
                        <h4>Upload country CSV </h4>
                        <?php
                        $cntry_csv_submit_btn = $_POST['cntry_csv_submit_btn'] ?? '';
                        if ('Upload Country CSV' == $cntry_csv_submit_btn) {

                            $allowed_file_type = array('csv');
                            $filename = $_FILES['cntry_csv_file']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);

                            if (in_array($ext, $allowed_file_type)) {
                                $handle = fopen($_FILES['cntry_csv_file']['tmp_name'], "r");
                                while (($data = fgetcsv($handle)) !== FALSE) {
                                    $wpdb->insert(
                                        $slagmp_countries_table,
                                        [
                                            'id'            => $data[0],
                                            'state_name'    => $data[1],
                                            'country_name'  => $data[2],
                                            'country_lat'   => $data[3],
                                            'country_lng'   => $data[4],
                                        ]
                                    );
                                }
                        ?>
                                <div class="alert alert-success">
                                    <strong>Successfully!</strong> Imported CSV file
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Please</strong> Upload only CSV file
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <form id="country_csv_file_importer" enctype='multipart/form-data' action='' method='post'>
                            <label>Upload CSV file</label>

                            <input class="form-control" type='file' name='cntry_csv_file'>
                            <input class="form-control mt-4 btn btn-info" type="submit" value="Upload Country CSV" name="cntry_csv_submit_btn">
                        </form>

                    </div>
                    <div class="import_csv shadow p-3 mb-5 bg-body rounded">
                        <h4>Upload shop CSV </h4>
                        <?php
                        $shp_csv_submit_btn = $_POST['shp_csv_submit_btn'] ?? '';
                        if ('Upload Shop CSV' == $shp_csv_submit_btn) {

                            $allowed_file_type = array('csv');
                            $filename = $_FILES['shop_csv_file']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);

                            if (in_array($ext, $allowed_file_type)) {
                                $handle = fopen($_FILES['shop_csv_file']['tmp_name'], "r");
                                while (($data = fgetcsv($handle)) !== FALSE) {
                                    $wpdb->insert(
                                        $shop_details_table,
                                        [
                                            'id'            => $data[0],
                                            'state_name'    => $data[1],
                                            'country'       => $data[2],
                                            'lat_val'       => $data[3],
                                            'long_val'      => $data[4],
                                            'shop_location' => $data[5],
                                            'logo_path'     => $data[6],
                                            'headline'      => $data[7],
                                            'adrs_line_one' => $data[8],
                                            'adrs_line_two' => $data[9],
                                            'tell'          => $data[10],
                                            'fax'           => $data[11],
                                            'website'       => $data[12],
                                            'email'         => $data[13],
                                            'info'          => $data[14],
                                            'info_three'    => $data[15],
                                        ]
                                    );
                                }
                        ?>
                                <div class="alert alert-success">
                                    <strong>Successfully!</strong> Imported CSV file
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Please</strong> Upload only CSV file
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <form id="shop_csv_file_importer" enctype='multipart/form-data' action='' method='post'>
                            <label>Upload CSV file</label>
                            <input class="form-control" type='file' name='shop_csv_file'>
                            <input class="form-control mt-4 btn btn-info" type="submit" value="Upload Shop CSV" name="shp_csv_submit_btn">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>