<?php
    // Call " include 'this php directory'; " and the "candidate table" for $selections if you want to place it inside your code. 
    // Example (for jquery): 
    //
    // $("#id").load("this php directory", {
    //      table_selected : "mayor_candidates",
    //      regions : "REGION I (ILOCOS REGION)",
    //      provinces : "ILOCOS NORTE",
    //      city_or_municipalities : "BACARRA"
    // }) 
    //
    // Example (for php):
    //
    // $_POST['table_selected'] = 'pres_candidates';
    // $_POST['regions'] = 'REGION I (ILOCOS REGION)';
    // $_POST['provinces'] = 'ILOCOS NORTE';
    // $_POST['city_or_municipalities'] = 'BACARRA';
    // include 'this php directory';
    //
    // Meaning the #id will load the database from 'mayor_candidates' -> 'REGION I (ILOCOS REGION)' -> 'ILOCOS NORTE' -> 'BACARRA'
    //
    // For the keywords of locations, refer to the 'philippines_addr.sql' database or just look my dropdowns on the 'db_displayUI.php' since I already loaded them all there
    // There is already some classes provided in this html element and it can already be designed/accessed by your implemented .css to your php/html file

    include 'db_connect.php';
    candidates_db();

    $selections = array();

    // Use the variables here that was placed inside the $_POST 
    $selections[0] = isset($_POST['table_selected']) && !empty($_POST['table_selected']);
    $selections[1] = isset($_POST['regions']) && !empty($_POST['regions']);
    $selections[2] = isset($_POST['provinces']) && !empty($_POST['provinces']);
    $selections[3] = isset($_POST['city_or_municipalities']) && !empty($_POST['city_or_municipalities']);

    switch ($selections) {
        case ($selections[0] && $selections[1] && $selections[2] && $selections[3]): // For mayor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];
            $city_or_municipalities = $_POST['city_or_municipalities'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces' AND city_or_municipalities='$city_or_municipalities' 
            ORDER BY candidate ASC, regions ASC, provinces ASC, city_or_municipalities ASC";
        break;

        case ($selections[0] && $selections[1] && $selections[2]): // For governor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces' ORDER BY candidate ASC, provinces ASC, regions ASC";
        break;

        case ($selections[0] && $selections[1]):
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];

            $sql = "SELECT * from $table WHERE regions='$regions' ORDER BY candidate ASC, regions ASC, provinces ASC";
        break;

        case ($selections[0]): // For pres_candidates and vcpres_candidates database
            $table = $_POST['table_selected'];
            $sql = "SELECT * from $table ORDER BY candidate ASC";
        break;
    }

    if ($sql) {
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $data)
        {
?>  
            <div class='cells'>
                <div class='candidate_card'>
                    <img src='<?= $data[4] ?>' class='candidate_picture' width='100' height='100'>
                    <p class="candidate_name"><?= $data[1] ?></p>
                    <p class="partylist"><span class="category">Partylist: </span><?= $data[3] ?></p>
                    <p class="information"><span class="category">Sex: </span><?= $data[2] ?></p>
                    <p class="information"><span class="category">Nickname: </span><?= $data[5] ?></p>
                    <p class="information"><span class="category">Age: </span><?= $data[6] ?></p>
                    <p class="information"><span class="category">Birthdate: </span><?= $data[7] ?></p>
                    <p class="information"><span class="category">Hometown: </span><?= $data[8] ?></p>
                    <ul class="information"><span class="category">Honorary Degree: </span>
<?php 
            $list = explode("|", $data[9]);
            foreach ($list as $bullet) {
?>
                        <li class="bullet"><?= $bullet ?></li>
<?php
            }
?>
                    </ul>
                    <ul class="information"><span class="category">Tertiary: </span>
<?php
            $list = explode("|", $data[10]);
            foreach ($list as $bullet) {
?>
                        <li class="bullet"><?= $bullet ?></li>
<?php
            }
?>
                    </ul>
                    <ul class="information"><span class="category">Political Backgrounud: </span>
<?php
            $list = explode("|", $data[11]);
            foreach ($list as $bullet) {
?>
                        <li class="bullet"><?= $bullet ?></li>
<?php
            }
?>
                    </ul>
<?php
            if ($table == "pres_candidates" || $table == "vcpres_candidates") {
?>
                    <p class="stance"><span class="category">Divorce: </span><?= $data[12] ?></p>
                    <p class="stance"><span class="category">Death Penalty: </span><?= $data[13] ?></p>
                    <p class="stance"><span class="category">Same Sex Marriage: </span><?= $data[14] ?></p>

<?php
            }
            // Note: You can comment out this section if you don't want to display it onscreen the specific regions and cities of every mayors and governors 
            elseif ($table == "governor_candidates" || $table == "mayor_candidates") {
?>
                    <p class="location"><span class="category">Region: </span><?= $data[12] ?></p>
                    <p class="location"><span class="category">Province: </span><?= $data[13] ?></p>
<?php
                if (array_key_exists(13, $data)) {
?>
                    <p class="location"><span class="category">City or Municipality: </span><?= $data[14] ?></p>
<?php
                }
            }
?>
                </div>
            </div>
<?php
        }
    }
    else {
?>
        <div class='columns'>
            <h2> Database Empty </h2>
        </div>
<?php
    }
    mysqli_close(candidates_db());
?>