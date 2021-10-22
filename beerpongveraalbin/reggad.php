
<!DOCTYPE html>
<html>
<head>
<title>BEERPONG TOURNAMENTS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="beerpong.css">
</head>
    <body>
         <canvas id="canvas"></canvas>
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
         
          window.onload = function () {
    //canvas init
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");

    //canvas dimensions
    var W = window.innerWidth;
    var H = window.innerHeight;
    canvas.width = W;
    canvas.height = H;

    //snowflake particles
    var mp = 200; //max particles
    var particles = [];
    for (var i = 0; i < mp; i++) {
        particles.push({
            x: Math.random() * W, //x-coordinate
            y: Math.random() * H, //y-coordinate
            r: Math.random() * 15 + 1, //radius
            d: Math.random() * mp, //density
            color: "rgba(" + Math.floor((Math.random() * 255)) + ", " + Math.floor((Math.random() * 255)) + ", " + Math.floor((Math.random() * 255)) + ", 0.8)",
            tilt: Math.floor(Math.random() * 5) - 5
        });
    }

    //Lets draw the flakes
    function draw() {
        ctx.clearRect(0, 0, W, H);



        for (var i = 0; i < mp; i++) {
            var p = particles[i];
            ctx.beginPath();
            ctx.lineWidth = p.r;
            ctx.strokeStyle = p.color; // Green path
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.x + p.tilt + p.r / 2, p.y + p.tilt);
            ctx.stroke(); // Draw it
        }

        update();
    }

    //Function to move the snowflakes
    //angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
    var angle = 0;

    function update() {
        angle += 0.01;
        for (var i = 0; i < mp; i++) {
            var p = particles[i];
            //Updating X and Y coordinates
            //We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
            //Every particle has its own density which can be used to make the downward movement different for each flake
            //Lets make it more random by adding in the radius
            p.y += Math.cos(angle + p.d) + 1 + p.r / 2;
            p.x += Math.sin(angle) * 2;

            //Sending flakes back from the top when it exits
            //Lets make it a bit more organic and let flakes enter from the left and right also.
            if (p.x > W + 5 || p.x < -5 || p.y > H) {
                if (i % 3 > 0) //66.67% of the flakes
                {
                    particles[i] = {
                        x: Math.random() * W,
                        y: -10,
                        r: p.r,
                        d: p.d,
                        color: p.color,
                        tilt: p.tilt
                    };
                } else {
                    //If the flake is exitting from the right
                    if (Math.sin(angle) > 0) {
                        //Enter from the left
                        particles[i] = {
                            x: -5,
                            y: Math.random() * H,
                            r: p.r,
                            d: p.d,
                            color: p.color,
                            tilt: p.tilt
                        };
                    } else {
                        //Enter from the right
                        particles[i] = {
                            x: W + 5,
                            y: Math.random() * H,
                            r: p.r,
                            d: p.d,
                            color: p.color,
                            tilt: p.tilt
                        };
                    }
                }
            }
        }
    }

    //animation loop
    setInterval(draw, 20);
}
    </script>
</body>
</html>
 <?php  
            $host = 'localhost';
            $username = 'zfjyyokx_db_beerpong';
            $password = 'pickpack0147';
            $dbname = 'zfjyyokx_beerpong';
           
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