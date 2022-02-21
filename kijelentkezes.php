<?php
include './csatolt.php';
$_SESSION['fnev']=0;
$_SESSION['nev']="";
$_SESSION['jogosultsag']=0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Puzzle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./style2.css">
    </head>
    <body>
        <div class="sor">
            <div class="oszlop">
            <div class="kartya">
                <img src="./kepek/shop.png" alt="Bolt">
                <div class="tartalom">
                    <h4><a href="./shop.php">Bolt</a></h4>
                </div>                
                </div>
            </div>
            <div class="oszlop">
            <div class="kartya">
                <img src="./kepek/admin.png" alt="adminisztráció">
                <div class="tartalom">
                    <h4><a href="./index.php">Adminisztráció</a></h4>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>