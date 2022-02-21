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
        .oszlop{
        width: 33%;        
        }


    </style>
    </head>
    <body>
    <?php
        if ($_SESSION['jogosultsag'] == 1){
            ?>
            <nav class=menu>
                <ul>
                    <li><a href="./felhasznalok.php">Felhasználók karbantartása</a></li>
                    <li><a href="./termekek.php">Termékek karbantartása</a></li>
                    <li><a href="./rendelesek.php">Rendelések</a></li>
                    <li><a href="./shop.php">Bolt</a></li>
                    <li><a href="./kijelentkezes.php">Kijelentkezés</a></li>
                </ul>
                <div class="allapot" ><?php echo $_SESSION['nev']; ?></div>
                </nav>
            <?php
        } else {
            ?>
            <div class= "allapot" onclick="mutat('bejelentkezes')">Jelentkezzen be</div>
            <?php
        }
            ?>           
          
        
        <?php
            if ($_SESSION['jogosultsag'] == 1) {
                
                if (isset($_GET["torol"])){
                    $sqlmondat = "DELETE FROM user WHERE userid in (";
                    foreach ($_GET["eredmeny"] as $elem){
                        $sqlmondat.=$elem.",";
                    }
                    $sqlmondat=substr($sqlmondat, 0, strlen($sqlmondat)-1).")";
                    mysqli_query($kapcsolat, $sqlmondat);
                }
                ?>
                <div class="sor">
                    <div class="oszlop">
                        <div class="kartya">
                            <h3>Felhasználó keresése</h3>
                            <div class="felhkeres">
                                <table>
                                    <tr> 
                                        <td>Név: </td><td><input type="text" id="nev" size="40"></td>
                                    </tr>
                                    <tr>
                                        <td>Felhasználónév: </td><td><input type="text" id="fnev" size="40"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="button"><input type="button" value="Keresés" onclick="keres()"></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                
                
                    <div class="oszlop">
                        <div class="kartya">
                            <h3>Keresések eredménye</h3>
                            <div id="adatok"></div>                            
                        </div>
                    </div>
                
                
                    <div class="oszlop">
                        <div class="kartya">
                            <h3>Felhasználók</h3>
                            <div id="felhasznalo"></div>
                            <div id="ujfelhasznalo"><input type="button" value="Új felhasználó létrehozása" onclick="modosit(0)"></div>                            
                        </div>
                    </div>
                </div>                            
                
                
                
                <?php
            } else {
                ?>
                Jelenkezzen előbb be....
                <?php
            }
        ?>
    </body>
</html>