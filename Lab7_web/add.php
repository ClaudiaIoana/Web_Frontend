<?php

use FTP\Connection;
session_start();
include ('database/connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$con = OpenConnection();
	if(isset($_POST['add'])){
		$location_name = $con->real_escape_string($_POST['location_name']);
		$country_name = $con->real_escape_string($_POST['country_name']);
		$description = $con->real_escape_string($_POST['description']);
		$tourist_targets = $con->real_escape_string($_POST['tourist_targets']);
		$estimated_cost = $con->real_escape_string($_POST['estimated_cost']);

		$stmt = $con->prepare("INSERT INTO destination(id, location_name, country_name, description, tourist_targets, estimated_cost) VALUES(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("issssi", $id, $location_name, $country_name, $description, $tourist_targets, $estimated_cost);
		$stmt->execute();
	}
	CloseConnection($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books Processing</title>
	<script type="https://code.jquery.com/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
<button class="home" type="button" onclick="location.href='./index.html'">HOME </button>
<br>

<section class="add_form">
    <form action="add.php" method="post">
        <!--<input id="bid" type="text" name="bid" placeholder="bid">-->
        <input id="location_name" type="text" name="location_name" placeholder="location_name">
        <input id="country_name" type="text" name="country_name" placeholder="country_name">
        <input id="description" type="text" name="description" placeholder="description">
        <input id="tourist_targets" type="text" name="tourist_targets" placeholder="tourist_targets">
        <input id="estimated_cost" type="text" name="estimated_cost" placeholder="estimated_cost">
        <input id="add" type="submit" name="add" value="Add new destination">
        <!-- <input id="update" type="submit" name="update" value="Update document"> -->
    </form>
</section>

<section class="display_add">
    <br>
    <table class="display-table">
        <thead>
            <!--<th>ID</th>-->
            <th>Location Name</th>
            <th>Country Name</th>
            <th>Description</th>
            <th>Tourist Targets</th>
            <th>Estimated Cost</th>
        </thead>
        <tbody>

            <?php
            $con = OpenConnection();
            $result_set = mysqli_query($con, "SELECT * FROM destination");
            
            while($row = mysqli_fetch_array($result_set)){
                echo "<tr>";
                /*echo  "<td>" . $row['bid'] . "</td>";*/
                echo  "<td>" . $row['location_name'] . "</td>";
                echo  "<td>" . $row['country_name'] . "</td>";
                echo  "<td>" . $row['description'] . "</td>";
                echo  "<td>" . $row['tourist_targets'] . "</td>";
                echo  "<td>" . $row['estimated_cost'] . "</td>";
                echo   "</tr>";
            }
            CloseConnection($con);
            ?>

        </tbody>
    </table>
</section>


<!-- <button class='btnUpdate' id='edit' name='edit' type='button' value= ". $row['id'] . " onclick=\"location.href='./update.php'\">Update</button> -->
</body>

</html>