<?php
/**
 * Created by PhpStorm.
 * User: Keetmalin
 * Date: 4/12/2017
 * Time: 1:07 PM
 */

include '../Connection/connection.php';

$busNumber = $_GET['busNumber'];

$bus_table = 'bus_' . $busNumber;

$query = "SELECT * FROM bus_nn1111";
$result = $conn->query($query);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

$num_rows = $result->num_rows;
$counter = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if (++$counter == $num_rows) {

            $long = $row['LocationLong'];
            $lati = $row['LocationLati'];

            $arr = array('LocationLong' => $long, 'LocationLati' => $lati);
            echo json_encode($arr);

        } else {
            continue;
        }
    }
} else {
    echo ("Error");
}