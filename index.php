<! DOCTYPE html>
<html>

<head>
    <title> Assignment </title>
</head>

<body>

    <form action="test.php" method="POST">
        <input type="text" name="eventName" placeholder="name">
        <br>

        <input type="text" name="eventDescription" placeholder="Description">
        <br>

        <input type="text" name="eventVenue" placeholder="venue">
        <br>

        <button type="submit" name="submit">Add Event</button>

    </form>
    
    <?php 
        $dbhost = "localhost";
        $dbuser = "phpmyadmin";
        $dbpass = "1234";
        $db = "testdb";

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


        $sql = "SELECT * FROM `testingPhp` ;";
        $result = mysqli_query($conn, $sql);
        $numUser = mysqli_num_rows($result);

        echo "id -- name -- description -- venue  <br>";
        if($numUser > 0) {
            while($row = mysqli_fetch_assoc($result)){
                // echo $row['Name']."<br>";
                echo "<br>".implode("  --   " , $row);

                echo "   <a href=delete.php?id=".$row['id']."> <Button>Delete </Button> </a> <br>";
                
            }
        }

    ?>

</body>

</html>