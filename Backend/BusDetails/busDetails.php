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
    $total_passengers = 0;

    while ($row = $result->fetch_assoc()) {
        if (++$counter == $num_rows) {

            $Time = $row['Time'];
            $Cum_Distance = $row['Cum_Distance'];
            $Passengers = $row['Passengers'];
            $Psngrs_in = $row['Psngrs_in'];
            $Psngrs_out= $row['Psngrs_out'];

            $total_passengers = $total_passengers + $Psngrs_in - $Psngrs_out;

            $arr = array('Bus_Number' => $Bus_Number, 'Time' => $Time, 'Cum_Distance' => $Cum_Distance ,
                'Passengers' => $Passengers , 'Total_Passengers' => $total_passengers);
            echo json_encode($arr);

        } else {
            $Psngrs_in = $row['Psngrs_in'];
            $Psngrs_out= $row['Psngrs_out'];

            $total_passengers = $total_passengers + $Psngrs_in - $Psngrs_out;
        }
    }
} else {
    echo ("Error");
}