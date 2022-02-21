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
        <div class="kartya">
            <h3>Regisztráció</h3>
            <div class="urlap">
                <form action="./felhuj.php" method="GET">
                    <table>
                    <tr><td>Név: </td><td><input type="text" id="modnev"></td></tr>
                    <tr><td>E-mail cím: </td><td><input type="email" id="username"></td></tr>
                    <tr><td>Jelszó: </td><td><input type="password" id="password" size="40"></td></tr>
                    <tr><td>Jelszó újra: </td><td><input type="password" id="password2" size="40" onchange="ellenorzes('password', 'password2', 'rogzit')"></td></tr>
                    <tr><td>Irányítószám: </td><td><input type ="number" id="irszam" placeholder="1234"></td></tr>
                    <tr><td>Település: </td><td><input type="text" id="telepules"></td></tr>
                    <tr><td>Közterület: </td><td><input type="text" id="kterulet"></td></tr>
                    <tr><td>Házszám: </td><td><input type="text" id="hszam"></td></tr>
                    <tr><td>Telefonszám: </td><td><input type="text" id="telszam" placeholder="20-123-4567"><td></tr>
                    <tr><td>Adószám: </td><td><input type="text" id="adoszam" placeholder="123456-1-23"></td></tr>
                    <tr style="display:none;"><td>Jog: </td><td><input type="text" id="jog" value="2"></td></tr>
                    <tr><td class="button"><input type="button" id="rogzit" value="Regisztráció" onclick="felhuj()"></td><td><input type="button" value="Mégse" onclick="vissza()"><td></tr>
                    </table>

                </form>
            </div>
        </div>
    </body>