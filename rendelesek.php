<?php
    include './csatolt.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Puzzle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style.css">
        <script src="js.js"></script>
    </head>
    <body>
        <?php
            if ($_SESSION['jogosultsag'] == 1) {
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
            } else {
                ?>
                Jelenkezzen előbb be....
                <?php
            }
        ?>
    </body>
</html>