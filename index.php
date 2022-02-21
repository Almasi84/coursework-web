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
    </head>
    <body>    
    </div>
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
                <div id="felhasznalo" class="allapot" ><?php echo $_SESSION['nev']; ?></div>
            </nav>
            <?php
        }else{
            ?>
            <div id="bejelentkezes">
                <h2 class="fejlec">Bejelenkezés</h2>
                <div class= "tartalom">
                    <table>
                        <tr><td><input type="text" id="fnev" placeholder = "E-mail"></td></tr>
                        <tr><td><input type="password" id="jelszo" placeholder="Jelszó"></td></tr>
                        <tr><td><input type="button" value="Bejelentkezés" onclick="bejelentkezes()"></td></tr>
                    </table>                                       
                </div>
            </div>
            <?php
        } 
    ?>
    </body>
</html>