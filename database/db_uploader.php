<?php
    // Do not bother this code. It is for my own matters only. It's a mess XD

    include '../snippets/db_uploader_functions.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $table = $_POST['tables'];
        switch ($table) {
            case 'pres_candidates':
                upload_POST($table, 'pres_table');
            break;

            case 'vcpres_candidates':
                upload_POST($table, 'vcpres_table');
            break;

            case 'governor_candidates':
                upload_POST($table, 'governor_table');      
            break;

            case 'mayor_candidates':
                upload_POST($table, 'mayor_table');
            break;
        }      
    }
?>

<?php
    // Error catcher(?) NOT YET WORKING
    function alert($msg) {
        echo "<script type='text'>alert('$msg');</script>";
    }
?>

<?php
    function upload_POST($table, $sql) {
        include 'db_connect.php';
        candidates_db();
        
        // ==============================================================
        $candidate = $_POST['candidate'];
        $sex = $_POST['sex']; 
        $partylist = $_POST['partylist'];
        $nickname = $_POST['nickname'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $hometown = $_POST['hometown'];
        $honorary_degree = $_POST['honorary_degree'];
        $tertiary = $_POST['tertiary'];
        $political_background = $_POST['political_background'];
        // ==============================================================
        isset($_POST['regions']) ? $region = $_POST['regions'] : '';
        isset($_POST['provinces']) ? $province = $_POST['provinces'] : '';
        isset($_POST['city_or_municipalities']) ? $city_or_municipality = $_POST['city_or_municipalities'] : '';
        // ==============================================================
        isset($_POST['stance_divorce']) ? $stance_divorce = $_POST['stance_divorce'] : '';
        isset($_POST['stance_death_penalty']) ? $stance_death_penalty = $_POST['stance_death_penalty'] : '';
        isset($_POST['stance_same_sex_marriage']) ? $stance_same_sex_marriage = $_POST['stance_same_sex_marriage'] : '';
        // ==============================================================
        
        $fileName = basename($_FILES['fileToUpload']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            switch ($sql) {
                case 'pres_table': case 'vcpres_table':
                    if ($sql == 'pres_table') {
                        $directory = directory_editor('presidents');
                    }
                    else if ($sql == 'vcpres_table') {
                        $directory = directory_editor('vc_presidents');
                    }

                    ?>
                    <script>
                        console.log(<?= $sql ?>)
                    </script>

                    <?php

                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);

                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate);

                    $sql = "INSERT INTO $table (candidate, sex, partylist, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                    stance_divorce, stance_death_penalty, stance_same_sex_marriage) 
                    VALUES ('$candidate', '$sex' ,'$partylist', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                    '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage')";

                break;

                case 'governor_table':
                    $directory = directory_editor('governors', $region, $province);
                    
                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);  

                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate, $region, $province);

                    $sql = "INSERT INTO $table (candidate, sex, partylist, picture_dir, nickname, age, birthdate, hometown, honorary_degree, 
                    tertiary, political_background, regions, provinces) 
                    VALUES ('$candidate', '$sex', '$partylist', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', 
                    '$tertiary', '$political_background', '$region', '$province')";
                break;

                case 'mayor_table':
                    $directory = directory_editor('mayors', $region, $province, $city_or_municipality);

                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);

                    
                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate, $region, $province, $city_or_municipality);

                    $sql = "INSERT INTO $table (candidate, sex, partylist, picture_dir, nickname, age, birthdate, hometown, honorary_degree, 
                    tertiary, political_background, regions, provinces, city_or_municipalities) 
                    VALUES ('$candidate', '$sex', '$partylist', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', 
                    '$political_background', '$region', '$province', '$city_or_municipality')";
                break;
            }
            mysqli_query(candidates_db(), $sql);
        }
        else {
            alert("Only Pictures are Allowed!");
        }


        mysqli_close(candidates_db());  
    }
?>

