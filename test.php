<?php

    /** #### This section makes DATABASE Connection #### */

    $dbhost = "localhost";
    $dbuser = "phpmyadmin";
    $dbpass = "1234";
    $db = "testdb";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    // $sql = "SELECT * FROM users;";
    // $result = mysqli_query($conn, $sql);
    // $numUser = mysqli_num_rows($result);

    // if($numUser > 0) {
    //     while($row = mysqli_fetch_assoc($result)){
    //         echo $row['name']."<br>";
    //     }
    // }

    $n = $_POST['eventName'];
    $d = $_POST['eventDescription'];
    $v = $_POST['eventVenue'];

    /** #### This section is Validation #### */

    $errors = array();

    if(empty($n)) {
        array_push($errors, "name empty");
    }
    if(empty($d)){
        array_push($errors, "empty desc");
    }
    if(empty($v)){
        array_push($errors, "empty venue");
    }

    $eventNameCheckQuery = "SELECT * FROM `testingPhp` WHERE name= '$n' LIMIT 1;";
    $result = mysqli_query($conn, $eventNameCheckQuery);
    $na = mysqli_fetch_assoc($result);

    if($na){
        array_push($errors, "duplicate event name");
    }



    if(count($errors) == 0){
        $post_sql = "INSERT INTO `testingPhp` (name, description, venue) VALUES ( '$n' , '$d', '$v');"; 
        mysqli_query($conn, $post_sql);
        header("Location: ../Ecell/index.php?addtion=succes");
    }
    else {
        echo implode( ",  ", $errors);
    }
    
    
    

?>




