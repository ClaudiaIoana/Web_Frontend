<?php

use FTP\Connection;
include ('database/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Destinations Browser</title>
    <script type="text/javascript" src="browse.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<button class="home" type="button" onclick="location.href='./index.html'">HOME </button>

<div id="previous-filter">

</div>

<center>
    <div id="main">

        <h1> Destinations </h1>
        <div" style="float: left";>

            <select id="select-genre" name="Select Filter" onchange="get_filtered_by_country()">
                <?php
                    $con = OpenConnection();
                    $sql = "SELECT DISTINCT country_name FROM destination";
                    $result_set = $con->query($sql);

                    if(mysqli_num_rows($result_set) > 0){
                        while($row = mysqli_fetch_array($result_set)){
                            $type = ''. $row['country_name'] .'';
                            echo '<option>' . $type . '</option>';
                        }
                    }
                    CloseConnection($con);
                ?>

            </select>

        </div>


        <br />
        <br />


        <table id="browse-table" class="browse-table">
            <thead id>
                <th>ID</th>
                <th>Location Name</th>
                <th>Country Name</th>
                <th>Description</th>
                <th>Tourist Targets</th>
                <th>Estimated Cost</th>
            </thead>
            <tbody id="browse-tbody">
                <?php
                    $con = OpenConnection();
                    $result_set = mysqli_query($con, "SELECT * FROM destination");
                    
                    while($row = mysqli_fetch_array($result_set)){
                        echo " <tr>";
                        echo  "<td>" . $row['id'] . "</td>";
                        echo  "<td>" . $row['location_name'] . "</td>";
                        echo  "<td>" . $row['country_name'] . "</td>";
                        echo  "<td>" . $row['description'] . "</td>";
                        echo  "<td>" . $row['tourist_targets'] . "</td>";
                        echo  "<td>" . $row['estimated_cost'] . "</td>";
                        echo   "</tr>";
                    }
                    CloseConnection($con)
                ?>
            </tbody>
        </table>

        <label>
        </label>

    </div>
</center>
</body>
</html>