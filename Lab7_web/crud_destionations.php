<?php

use FTP\Connection;
include ('database/connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$con = OpenConnection();
	if(isset($_POST['add'])){
        $id = $_POST['id'];
        $location_name = $_POST['location_name'];
        $country_name = $_POST['country_name'];
        $description = $_POST['description'];
        $tourist_targets = $_POST['tourist_targets'];
        $estimated_cost = $_POST['estimated_cost'];
        $query = "INSERT INTO destination VALUES('$id', '$location_name', '$country_name', '$description', '$tourist_targets', '$estimated_cost')";
        $con->query($query);
    }
    else if(isset($_POST['update'])){
        $bid = $_POST['id'];
        $title = $_POST['location_name'];
        $author = $_POST['author'];
        $nrPages = $_POST['nrPages'];
        $genre = $_POST['genre'];
        $borrowed = $_POST['borrowed'];
        $query = "UPDATE destination SET location_name='$location_name', country_name='$country_name', description='$description', tourist_targets='$tourist_targets', estimated_cost='$estimated_cost' WHERE id='$id'";
        $con->query($query);
    }

    CloseConnection($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Destinations Processing </title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
<button class="home" type="button" onclick="location.href='./index.html'">HOME </button>
<br>

<section class="add_form">
    <form action="crud_documents.php" method="post">
        <input id="id" type="text" name="id" placeholder="id">
        <input id="location_name" type="text" name="location_name" placeholder="location_name">
        <input id="country_name" type="text" name="country_name" placeholder="country_name">
        <input id="description" type="text" name="description" placeholder="description">
        <input id="tourist_targets" type="text" name="tourist_targets" placeholder="tourist_targets">
        <input id="estimated_cost" type="text" name="estimated_cost" placeholder="estimated_cost">
        <input id="add" type="submit" name="add" value="Add new destination">
        <!-- <input id="update" type="submit" name="update" value="Update document"> -->
    </form>
</section>

<section class="update_form">
    <form action="crud_documents.php" method="post">
        <input id="id" type="text" name="id" placeholder="id">
        <input id="location_name" type="text" name="location_name" placeholder="location_name">
        <input id="country_name" type="text" name="country_name" placeholder="country_name">
        <input id="description" type="text" name="description" placeholder="description">
        <input id="tourist_targets" type="text" name="tourist_targets" placeholder="tourist_targets">
        <input id="estimated_cost" type="text" name="estimated_cost" placeholder="estimated_cost">
        <input id="update" type="submit" name="update" value="Update destination">
    </form>
</section>

<section class="display">
    <br>
    <table class="display-table">
        <thead>
            <th>ID</th>
            <th>Location Name</th>
            <th>Country Name</th>
            <th>Description</th>
            <th>Tourist Targets</th>
            <th>Estimated Cost</th>
            <th> </th>
        </thead>
        <tbody>

            <?php
            $con = OpenConnection();
            $result_set = mysqli_query($con, "SELECT * FROM destination");
            
            while($row = mysqli_fetch_array($result_set)){
                echo "<tr>";
                echo  "<td>" . $row['id'] . "</td>";
                echo  "<td>" . $row['location_name'] . "</td>";
                echo  "<td>" . $row['country_name'] . "</td>";
                echo  "<td>" . $row['description'] . "</td>";
                echo  "<td>" . $row['tourist_targets'] . "</td>";
                echo  "<td>" . $row['estimated_cost'] . "</td>";
                echo  "<td> 
                            <button class='btnUpdate' type='button'>Update</button>
                            <button class='btnDelete' type='button'>Delete</button>
                      </td>
                      </tr>";
            }
            CloseConnection($con);
            ?>

        </tbody>
    </table>
</section>


<!-- <button class='btnUpdate' id='edit' name='edit' type='button' value= ". $row['id'] . " onclick=\"location.href='./update.php'\">Update</button> -->
</body>

</html>