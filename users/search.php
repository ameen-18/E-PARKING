<!DOCTYPE html>
<html>
<head>
    
    <title>Parking Locations</title>
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
      
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
<?php include_once('includes/sidebar.php');?>

<!-- Left Panel -->

<!-- Right Panel -->

 <?php include_once('includes/header.php');?>

    <h1>Parking Locations</h1>

    <?php
    // Check if the 'location' key is set in the $_POST array
    if (isset($_POST['location'])) {
        $location = urlencode($_POST['location']);

        // Embed a Google Map with the specified location
        echo '<div id="map"></div>';
        echo '<script>
            function initMap() {
                var geocoder = new google.maps.Geocoder();
                var map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 15,
                    center: { lat: 0, lng: 0 } // Default center, will be updated after geocoding
                });
                
                geocoder.geocode({ address: "' . $location . '" }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                    } else {
                        alert("Geocoding was not successful for the following reason: " + status);
                    }
                });
            }
        </script>';
    }
    ?>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</html>
