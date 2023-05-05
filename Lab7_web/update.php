<?php

use FTP\Connection;
include ('database/connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$con =OpenConnection();
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $location_name = $con->real_escape_string($_POST['location_name']);
        $country_name = $con->real_escape_string($_POST['country_name']);
        $nrPages = $con->real_escape_string($_POST['description']);
        $genre = $con->real_escape_string($_POST['tourist_targets']);
        $borrowed = $con->real_escape_string($_POST['estimated_cost']);
        $query = "UPDATE book SET location_name='$location_name', country_name='$country_name', description='$description', tourist_targets='$tourist_targets', estimated_cost='$estimated_cost' WHERE id='$id'";
        // $con->query($query);
    }
    CloseConnection($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books Processing </title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<button type="button" onclick="location.href='./index.html'">HOME </button>
<!-- <button type="button" onclick="location.href='./crud_documents.php'">BACK </button> -->
<br>

</body>

<section class="update_form">
    <form class="update" action="update.php" method="post">
        <input id="location_name" type="text" name="location_name" placeholder="location_name" value="<?=$location_name?>" required/>
        <input id="country_name" type="text" name="country_name" placeholder="country_name" value="<?=$country_name?>" required/>
        <input id="description" type="text" name="description" placeholder="description" value="<?=$description?>" required/>
        <input id="tourist_targets" type="text" name="tourist_targets" placeholder="tourist_targets" value="<?=$tourist_targets?>" required/>
        <input id="estimated_cost" type="text" name="estimated_cost" placeholder="estimated_cost" value="<?=$estimated_cost?>" required/>
        <input id="update" type="submit" name="update" value="Update book">
    </form>
</section>


</html>