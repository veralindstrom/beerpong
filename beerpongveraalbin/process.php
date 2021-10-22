<?php
    $teamname = $_POST["team_name"];
	$player1 = $_POST["player1"];
	$player2 = $_POST["player2"];
    $player3 = $_POST["player3"];

    $host = 'localhost';
    $username = 'zfjyyokx_db_beerpong';
    $password = 'pickpack0147';
    $dbname = 'zfjyyokx_beerpong';
    
    //Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(!empty($teamname)){
        $sql = "INSERT INTO beerpong_lag (teamname, player1, player2, player3)
        VALUES ('$teamname', '$player1', '$player2', '$player3')";
    }
    else{
        echo "Välj ett lagnamn";
    }
    if ($conn->query($sql) === TRUE) {
        header("Location: http://veralindstrom.nu/beerpong/reggad.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

$conn->close();

	//print output text
	/*print "<p>Hello " . $teamname . " you are registered! <br>
            this is your team mates: ". $player1. ", ". $player2.", ".$player3."</p>";
	print "We will contact you very soon!";
    */
?>