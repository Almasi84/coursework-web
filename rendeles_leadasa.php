<?php
include './csatolt.php';
$ugyfel = array();
$ugyfel[0] = $_POST['nev'];
$ugyfel[1] = $_POST['irszam'];
$ugyfel[2] = $_POST['telepules'];
$ugyfel[3] = $_POST['kterulet'];
$ugyfel[4] = $_POST['hszam'];
$ugyfel[5] = $_POST['telszam'];
$ugyfel[6] = $_POST['email'];
$ugyfel[7] = $_POST['szallitas'];
$ugyfel[8] = $_POST['szallitas'];
$ugyfel[9] = $_POST['fizetes'];
$ugyfel[10] = $_POST['szcim'];
$ugyfel[11] = $_POST['adoszam'];

if ($_SESSION['fnev'] != ""){
    $sqlmondat = "SELECT userid FROM user WHERE username=\"".$_SESSION['fnev']."\"";
    $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
    $rekord = mysqli_fetch_assoc($eredmeny);
    $userid = $rekord['userid'];
}else{
    $userid = 0;
}


$adatok = serialize($ugyfel);
setcookie('ugyfel', $adatok, time()+86400, "/");
$id = 0;

$termekek = unserialize($_COOKIE['rendeles']);

if (count($termekek)>0){    
    $sqlmondat = "INSERT INTO rendeles(rendelesid, szall_mod, fiz_mod, allapot, irszam, telepules, kterulet, hszam, userid, nev, cim, adoszam) VALUES (0,".$ugyfel[8].", ".$ugyfel[9].",1,".$ugyfel[1].",'".$ugyfel[2]."','".$ugyfel[3]."','".$ugyfel[4]."',".$userid.", '".$ugyfel[0]."','".$ugyfel[10]."',".$ugyfel[11].")";
    mysqli_query($kapcsolat, $sqlmondat);
    $id = mysqli_insert_id($kapcsolat);
        for ($i = 0; $i < count($termekek); $i++){
            $sqlmondat = "SELECT ROUND((termekar-(termekar*akcio/100))) as fizetendo from termek where termekid=".$termekek[$i][0];            
            $sor = mysqli_fetch_array(mysqli_query($kapcsolat, $sqlmondat));
            $egysegar = $sor['fizetendo'];
            $darabszam = $termekek[$i][1];
            $sqlmondat = "INSERT INTO kosar (kosarid, rendelesid, termekid, vasaroltdb, fizetett) VALUES (0,".$id.",".$termekek[$i][0].",".$termekek[$i][1].",$egysegar*$darabszam)";
            mysqli_query($kapcsolat, $sqlmondat);
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
    </head>
    <body>
        <div>
        <h1>Sikeres vásárlás, a rendeles azonosítója: <?php echo $id; ?></h1><br>        
        </div>
        <?php
        $sqlmondat ="SELECT SUM(fizetett) as vegosszeg FROM `kosar` WHERE rendelesid=".$id;
        $sor = mysqli_fetch_array(mysqli_query($kapcsolat, $sqlmondat));
        $vegosszeg = $sor['vegosszeg'];
        ?>
        <div>
            <h3>A számla végösszege: <?php echo $vegosszeg; ?><span> Ft</span></h3>
        </div>
        <div>
            <input type='button' value='Bolt' href="./shop.php">
        </div>
    </body>