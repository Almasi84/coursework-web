<?php
    include "./csatolt.php";
    $sqlmondat =$_POST['mondat'];
    $eredmeny=mysqli_query($kapcsolat, $sqlmondat);
    $kiir = "<div class=\"urlap\"><form method=\"GET\" action=\"./termekek.php\"><table><tr><th></th><th>ID</th><th>Terméknév</th><th>Gyártó</th><tr>";
    while ($sor = mysqli_fetch_array($eredmeny)){
        $kiir = $kiir."<tr><td><input type=\"checkbox\" name=\"eredmeny[]\" value=\"".$sor['termekid']."\"></td><td>".$sor['termekid']."</td><td class=\"termekmod\" onclick=\"termekmod(".$sor['termekid'].")\">".$sor['termeknev']."</td><td>".$sor['gyarto']."</td></tr><br>";
    }
    $kiir=$kiir."<tr><td colspan=\"4\" class=\"button\"><input type=\"submit\" value=\"Kijelöltek törlése\" name=\"torol\"></td></tr></table></form></div>";
    echo $kiir;
?>