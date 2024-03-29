<!DOCTYPE html>
    <head>
        <title>Lets Play BrickBreak!</title>
        <link rel="stylesheet" href="style.css" >
        <script src="script.js"></script>
    </head>
    <body onload="docReady()" onkeydown="" onkeyup="" >
        <div class="machine">
            <div class="start" id="sTart"> 
                <br> <br>
                <h1>Brick Break</h1>
                <p>Created by Caleb Hinton</p>

                <button onclick="gStart();" class="gButton">Start Game</button> <br />
                <button onclick="gInfo();" class="gButton">Game Controls</button> <br />
                <button onclick="gScores();" class="gButton">High Scores</button>
            </div>

            <div class="start" id="gScores" style="display: none;">
                <p>high scores</p>
                
                <table width="80%" class="scoreTable">
                    <?php
                        include('db.php');
                        $newCon = openDB();
                        $results = mysqli_query($newCon, "SELECT * FROM highscores ORDER BY score DESC");
                        $num = 0;
                        
                    while (($row = mysqli_fetch_assoc($results)) && $num < 8) {
                        
                        echo "<tr><td>" . strtoupper($row["initials"]) . "</td><td>". $row["score"] . "</td></tr>";
                        $num++;
                    }  

                    ?>
                </table>
               
                <button onclick="gMenu2();" class="gButton">Main Menu</button>
            </div>

            <div class="start" id="gOver" style="display: none;" >
                <br> <br>
                <h1>Game Over!</h1>
                <h2>Your Score:</h2>
                <p id="score">0</p>
                <br><br>
                <p>Please enter your initials<p>
                <form method="post" action="addUser.php">
                    <input id="tScore" name="score" type="hidden" value="">
                    <input class="gText" type="text" id="name" autocorrect="off" maxlength="3" name="int">
                </form>
            </div>

            <div class="start" id="sInfo" style="display: none;"> 
                    <br>
                    <h1>How To Play!</h1>
                    <p>Move the paddle left and right using the following keys</p>
    
                    <img src="img/keys.png" width="40%" > <br />
                    <button onclick="gMenu();" class="gButton">Main Menu</button>
                </div>

            <div id="tGame" class="gameWindow">

                <div class="brickHolder" id="bHolder"></div>
                <div class="info3"><p style="margin-top: 0px;" id="total3">Score: 0</p></div>
                <div class="info2"><p style="margin-top: 0px;" id="total">Lives: 3</p></div>
                <div class="info"><p style="margin-top: 0px;" id="total2">Level: 1</p></div>
                <div class="ball" style="position: absolute" id="theball"> </div>

                <div class="paddle" id="thepad" style="position: absolute; left: 0; bottom: 0;">
                    <div class="pblockl" id="pLeft"> </div>
                    <div class="pblocklm" id="pLeftM"> </div>
                    <div class="pblockc" id="pCenter"> </div>
                    <div class="pblockrm" id="pRightM"> </div>
                    <div class="pblockr" id="pRight"> </div>
                </div>
            </div>      
        </div>
    </body>
</html>