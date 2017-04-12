<?php
/**
 * Created by PhpStorm.
 * User: Keetmalin
 * Date: 4/12/2017
 * Time: 1:07 PM
 */

include '../Connection/connection.php';

$Bus_Number = $_GET['Bus_Number'];

$bus_table = 'bus_' . $Bus_Number;

$query = "SELECT * FROM $bus_table";
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

            $long = $row['Location_Long'];
            $lati = $row['Location_Lati'];

            $arr = array('Bus_Number' => $Bus_Number, 'Location_Long' => $long, 'Location_Lati' => $lati);
            echo json_encode($arr);

        } else {
            continue;
        }
    }
} else {
    echo ("Error");
}