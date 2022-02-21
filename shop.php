<?php
    include './csatolt.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Puzzle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./style2.css">
        <script src="js.js"></script>
        <style>
        #bejelentkezes{
            visibility: hidden;
            display: none;
        }
        .oszlop {
            display: flex;
            flex-wrap: wrap;            
        }
        .kartya{
            margin-right: 15px;
        }
        input[type=number],
        input[type=text] {
            width: 15%;
        }
        </style>
    </head>
    <body>
        <nav class=menu>
        <ul>
            <li><a href="">Kezdőoldal</a></li>
            <li><a href="#puzzlek">Puzzlek</a></li>
            <li><a href="#kiegeszitok">Kiegészítők</a></li>
            <li><a href="./info.html">Információ</a></li>
            <li><a href="./kosarbaurlap.php">Kosár</a></li>
            <?php
            if ($_SESSION['fnev'] == ""){
                ?>
                <li><a onclick="mutat('bejelentkezes')">Bejelentkezés</a></li>
                <?php
            }else{
                ?>
                <li><a href="./kijelentkezes.php">Kijelentkezés</a></li>
                <?php
            }
            ?>
            <?php
            if ($_SESSION['jogosultsag'] == 1){
                ?>
                <li><a href="./index.php">Adminisztráció</a></li>
                <?php
            }
            ?>
            </ul>
            <div id="felhasznalo" class="allapot" ><?php echo $_SESSION['nev']; ?></div>
            </nav>
            <div id="bejelentkezes">
                <h2 class="fejlec">Bejelenkezés</h2>
                <div class= "tartalom">
                    <table>
                        <tr><td colspan="2"><input type="email" id="fnev" placeholder = "E-mail"></td></tr>
                        <tr><td colspan="2"><input type="password" id="jelszo" placeholder="Jelszó"></td></tr>
                        <tr><td class="regisztracio"><a href="./reg_urlap.php">Regisztráció</a></td><td><input type="button" value="Bejelentkezés" onclick="bejelentkezes()"></td></tr>
                    </table>                   
                </div>
            </div>
        <div class="logo"><img src="./kepek/logo.png" alt=""></div>
        <div id="uzenet" class="kartya"></div>
        <div id="puzzlek">
            <h1>Puzzlek</h1>
            <div class="oszlop">
            <?php
            $sqlmondat = "SELECT *,ROUND((termekar-(termekar*akcio/100))) as fizetendo FROM termek WHERE kategoria=1 AND elo_termek=1";
            $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
            if (mysqli_num_rows($eredmeny) > 0){
                while ($sor = mysqli_fetch_array($eredmeny)){
                    echo "<div class='kartya'>";
                    echo "<img class='puzzle' src='./nezeget.php?id=".$sor['termekid']."' onclick='nez(".$sor['termekid'].")'>";
                    echo "<h3>".$sor['termeknev']."</h3>";
                    echo "<details>";
                    echo "<div class='tartalom'>";
                    echo "<table>";
                    echo "<tr><td>Gyártó: </td><td>".$sor['gyarto']."</td></tr>";
                    echo "<tr><td>Szélesség: </td><td>".$sor['szelesseg']."</td></tr>";
                    echo "<tr><td>Hosszúság: </td><td>".$sor['hossz']."</td></tr>";
                    echo "<tr><td>Elemek száma: </td><td>".$sor['darab']."</td></tr>";
                    echo "</table>";
                    echo "</div>";
                    echo "</details>";
                    echo "<div class='ar'>";
                    if($sor['akcio']> 0){
                        echo "<p>!!AKCIÓ!!</p>";
                    }
                    echo "".$sor['fizetendo']." Ft</div>";                    
                    echo "<div class='vezerlok'>";
					echo "<label for='mennyiseg'>Mennyiség: </label>";
                    echo "<input type='number' min='0' max='99' value='0' id='".$sor['termekid']."' name='mennyiseg'>";
					echo "<input type='button' value='Kosárhoz ad' onclick='kosarba(".$sor['termekid'].")'>";
					echo "</div>";
                    echo "</div>";
                    
                }
            }
            ?>
        </div>            
        </div>
        <div id="kiegeszitok">
            <h1>Kiegészítők</h1>
            <div class="oszlop">
            <?php
            $sqlmondat = "SELECT * FROM termek WHERE kategoria=2 AND elo_termek=1";
            $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
            if (mysqli_num_rows($eredmeny) > 0){
                while ($sor = mysqli_fetch_array($eredmeny)){
                    echo "<div class='kartya'>";
                    echo "<img class='puzzle' src='./nezeget.php?id=".$sor['termekid']."' onclick='nez(".$sor['termekid'].")'>";
                    echo "<h3>".$sor['termeknev']."</h3>";
                    echo "<details>";
                    echo "<div class='tartalom'>";
                    echo "<table>";
                    echo "<tr><td>Gyártó: </td><td>".$sor['gyarto']."</td></tr>";                    
                    echo "</table>";
                    echo "</div>";
                    echo "</details>";
                    echo "<div class='ar'>".$sor['termekar']." Ft</div>";                    
                    echo "<div class='vezerlok'>";
					echo "<label for='mennyiseg'>Mennyiség: </label>";
                    echo "<input type='number' min='0' max='99' value='0' id='".$sor['termekid']."' name='mennyiseg'>";
					echo "<input type='button' value='Kosárhoz ad' onclick='kosarba(".$sor['termekid'].")'>";
					echo "</div>";
                    echo "</div>";
                    
                }
            }
            ?>
            </div>            
            </div>
        </div>
    </body>
    
</html>