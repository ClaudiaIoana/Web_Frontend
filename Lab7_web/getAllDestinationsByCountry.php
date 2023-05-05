<?php

use FTP\Connection;
include ('database/connection.php');
include ('database/destination.php');
try{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$con = OpenConnection();
        $country_name = json_decode(file_get_contents('php://input'), true)['country_name'];
        $stmt = $con->prepare("SELECT * FROM destination WHERE country_name=?");
        $stmt->bind_param("s", $country_name);
        // echo "abcde" . $type;
        $stmt->execute();
        $result_set = $stmt->get_result();
        $rows = array();
        while ($row = mysqli_fetch_array($result_set, MYSQLI_NUM)) {
            $rows[] = new Destinations($row[0],$row[1],$row[2],$row[3], $row[4],$row[5]);
        }
        header('HTTP/1.1 200 OK');
        echo json_encode($rows);
        CloseConnection($con);
        exit;
	}
} catch (Exception $e) {
	echo json_decode(
		array(
			'status' => false,
			'error' => $e->getMessage(),
			'error_code' => $e->getCode()
		)
	);
	CloseConnection($con);
	exit;
}

?>