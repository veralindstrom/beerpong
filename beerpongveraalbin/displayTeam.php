
<!DOCTYPE html>
<html>
<head>
<title>BEERPONG TOURNAMENTS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="beerpong.css">
</head>
    <body>
        <h1>
            <span style='color: #F7F975'>V</span>
            <span style='color: #B5F975'>e</span>
            <span style='color: #ffccff'>r</span>
            <span style='color: #3399ff'>a </span>
            <span style='color: #ff4d4d'>&</span>
            <span style='color: #dd99ff'>A</span>
            <span style='color: #b3fff0'>L</span>
            <span style='color: #ffaa80'>B</span>
            <span style='color: #ff80b3'>I</span>
            <span style='color: #99ff99'>N</span>
            <span style='color: #ffdd99'>S</span>
        </h1>
        <h2>ÖLPINGIS</h2>
        <h3>med Sverige-tema</h3>
        
        <center><p>Hur många spelare är ni?</p>
            <div class="dropdown">
           <button class="dropbtn">Antal spelare 
                <i class="fa fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <p onclick="twoPlayerFunction()">2</p>
                    <p onclick="threePlayerFunction()">3</p>
                </div>
        </div></center>
        
        <div id="registrering">
        <p>REGISTRERING</p>
        
        <form method="post" action="process.php">
            <h4>Lag-namn: </h4><input type="lagnamn" name="team_name" placeholder="Skriv erat lagnamn" /><br />
            <h4>Lagkamrat 1: </h4><input type="medlem" name="player1" placeholder="Namn på lagkamrat 1" /><br />
            <h4>Lagkamrat 2: </h4><input type="medlem" name="player2" placeholder="Namn på lagkamrat 2" /><br />
            <div id="thirdPlayer">
            <h4>Lagkamrat 3: </h4><input type="medlem" name="player3" placeholder="Namn på lagkamrat 3" /><br />
            </div>
            <input type="submit" value="Registrera" class="button" />
        </form>
        </div>
        
        <p>ANMÄLDA LAG</p>
        
     <script>
        document.getElementById("registrering").style.display = "none";
        
        
        function twoPlayerFunction() {
           document.getElementById("registrering").style.display = "block";
            document.getElementById("thirdPlayer").style.display = "none";
            
            document.getElementsByClassName("dropdown-content").style.display = "none";
        } 
        function threePlayerFunction() {
           document.getElementById("registrering").style.display = "block";
             document.getElementById("thirdPlayer").style.display = "block";
            
            document.getElementsByClassName("dropdown-content").style.display = "none";
        }  
    </script>
</body>
</html>
 <?php  
            $host = 'localhost';
            $username = 'zfjyyokx_beerpong';
            $password = 'pickpack0147';
            $dbname = 'zfjyyokx_db_beerpong';
           
            $conn = new mysqli($host, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, teamname, player1, player2, player3 FROM beerpong_lag";
            $result = $conn->query($sql);
            
            $player1;
            $player2;
            $player3;

            if ($result->num_rows > 0) {
                echo "<div class='registeredTeams'><ol>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row['player3'] != null){
                        echo "<li><h5>".$row['teamname'].": </h5>".
                                    $row['player1'].", ".
                                    $row['player2'].", ".
                                    $row['player3']."</li>";
                    }
                    else {
                         echo "<li><h5>".$row['teamname'].": </h5>".
                                    $row['player1'].", ".
                                    $row['player2']."</h4></li>";
                    }
                }
                echo "</ol></div>";
            } else {
                echo "<center>Inga anmälda lag</center>";
            }   

            $conn->close()
?>