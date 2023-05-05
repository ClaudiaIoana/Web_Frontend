<?php

use FTP\Connection;
include ('database/connection.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con = OpenConnection();
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $location_name = $_POST['location_name'];
        $country_name = $_POST['country_name'];
        $description = $_POST['description'];
        $tourist_targets = $_POST['tourist_targets'];
        $estimated_cost = $_POST['estimated_cost'];
        // $query = mysqli_prepare($con, "UPDATE document SET title=?, author=?, numberPages=?, type=?, format=? WHERE id=?");
        // mysqli_stmt_bind_param($query, "ssissi", $title, $author, $numberPages, $type, $format, $id);
        // mysqli_stmt_execute($query);
        // mysqli_stmt_close($query);
        $stmt = $con->prepare("UPDATE destination SET location_name=?, country_name=?, description=?, tourist_targets=?, estimated_cost=? WHERE id=?");
        $stmt->bind_param("ssssii", $location_name, $country_name, $description, $tourist_targets, $estimated_cost, $id);
        $stmt->execute();
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

<section class="update_form">
    <form action="modify.php" method="post">
        <input id="id" type="hidden" name="id" placeholder="id">
        <input id="location_name" type="text" name="location_name" placeholder="location_name">
        <input id="country_name" type="text" name="country_name" placeholder="country_name">
        <input id="description" type="text" name="description" placeholder="description">
        <input id="tourist_targets" type="text" name="tourist_targets" placeholder="tourist_targets">
        <input id="estimated_cost" type="text" name="estimated_cost" placeholder="estimated_cost">
        <input id="update" type="submit" name="update" value="Update destination">
    </form>
</section>

<section class="display_modify">
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