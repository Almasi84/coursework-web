<?php
    include './csatolt.php';
    if(!isset($_COOKIE['rendeles'])){
        $tomb = array();
        $rendeles = serialize($tomb);
        setcookie('rendeles',$rendeles,time()+86400, "/");
    } else {
        $tomb = unserialize($_COOKIE['rendeles']);
    }
    if (isset($_POST['id'])){
        $hossz = count($tomb);
        $tomb[$hossz][0] = $_POST['id'];
        $tomb[$hossz][1] = $_POST['db'];
        $rendeles = serialize($tomb);
        setcookie('rendeles',$rendeles,time()+86400, "/");
    }
    if (count($tomb) > 0){
        $uzenet = "<div class='tartalom'><h3>A kosarad tartalma:</h3>";
        for($i = 0; $i < count($tomb); $i++){
            $sqlmondat = "SELECT termeknev from termek where termekid=".$tomb[$i][0];            
            $sor = mysqli_fetch_array(mysqli_query($kapcsolat, $sqlmondat));
            $uzenet .= $tomb[$i][1]." db ".$sor['termeknev']."<br>";
        }
        $uzenet .= "<br><input type='button' value='Rendelés törlése' onclick='torol()'></div>";
        echo $uzenet;
    } else {
        echo "";
    }
?>