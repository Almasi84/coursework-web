<?php
    include './csatolt.php';
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['kep']['tmp_name'])) {
            $megnev = $_POST['megnev'];
            $kep = $_FILES['kep']['tmp_name'];
            $tipus = mime_content_type($kep);
            $kep = addslashes(file_get_contents($kep));
            $sqlmondat = "UPDATE termek SET kep ='$kep', keptipus='$tipus' WHERE termekid ='$megnev'";
            mysqli_query($kapcsolat, $sqlmondat) or die("Valami hiba van a rögzítésnél.." . mysqli_error($kapcsolat)." - ".$sqlmondat);
        }
    }
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
        width: 25%;
        }
    </style>
    </head>
    <body>
        <?php
            if ($_SESSION['jogosultsag'] == 1) {
                ?>
                <?php                        
                if (isset($_GET["torol"])){
                    $sqlmondat = "DELETE FROM termek WHERE termekid in (";
                    foreach ($_GET["eredmeny"] as $elem){
                        $sqlmondat.=$elem.",";
                    }
                    $sqlmondat=substr($sqlmondat, 0, strlen($sqlmondat)-1).")";
                    mysqli_query($kapcsolat, $sqlmondat);
                }
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
                <div class= "allpot" onclick="mutat('bejelentkezes')">Jelentkezzen be</div>
                <?php
            }
        ?>
        <div class="sor">
            <div class="oszlop">
                <div class="kartya">
                    <h3>Termék keresése</h3>
                    <div class="felhkeres">
                    <table>
                <tr> 
                    <td>Termék neve: </td>
                    <td><input type="text" id="termeknev" size="40"></td>
                </tr>
                <tr>
                   <td>Gyártó: </td>
                   <td>
                       <select id="gyarto" onchange="darab_kereses()">
                           <option value="">Válasszon</option>
                           <?php
                                $sqlmondat ="SELECT gyarto FROM termek";
                                $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
                                while($sor = mysqli_fetch_array($eredmeny)){
                                    echo "<option value='$sor[0]'>$sor[0]</option>";
                                }
                           ?>
                       </select>
                   </td>
                </tr>
                <tr>
                   <td>Darab: </td>
                   <td>
                       <select id="darab">
                           <option value='0'>Válasszon</option>
                           
                       </select>
                   </td>
                </tr>
                <tr>
                   <td>Elérhető: </td>
                   <td>
                   <input type="radio" name="elerheto" value="1" checked ><label for="elerheto">Igen</label>
                   <input type="radio" name="elerheto" value="0"><label for="nemelerheto">Nem</label>
                   </td>
                </tr>
                <tr>
                    <td colspan="2" class="button"><input type="button" value="Keresés" onclick="termek_keres()"></td>
                </tr>
                </table>

                    </div>
                </div>
            </div>
            <div class="oszlop">
                <div class="kartya">
                    <h3>Keresés eredménye</h3>
                    <div id="adatok"></div>
                </div>
            </div>
            <div class="oszlop">
                <div class="kartya">
                    <h3>Termékek</h3>
                    <div id="termekek"></div>
                    <div id="ujtermek"><input type="button" value="Új termék rögzítése" onclick="termekmod(0)"></div>
                </div>
            </div>
            <div class="oszlop">
                <div class="kartya">
                    <h3>Kép feltöltés</h3>
                    <div class="urlap">
                        <form method="post" enctype="multipart/form-data" action="">
                            <table>
                                <tr><th colspan="2">Képek feltöltése</th></tr>
                                <tr><td>Termék neve: </td><td>
                                <select name="megnev">
                                    <option value="">Válasszon</option>
                                    <?php
                                    $sqlmondat ="SELECT termeknev, termekid FROM termek";
                                    $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
                                    while($sor = mysqli_fetch_array($eredmeny)){
                                        echo "<option value='".$sor['termekid']."'>$sor[0]</option>";
                                    }
                                    ?>
                                </select>
                                </td></tr>
                                <tr><td>Kép: </td><td><input type="file" name="kep"></td></tr>
                                <tr><td colspan="2"><input type="submit" value="Feltöltés"></td></tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>                     
    </body>
</html>