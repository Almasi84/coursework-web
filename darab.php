<?php
include './csatolt.php';
$gyarto = $_POST['gyarto'];
$sqlmondat = "SELECT distinct darab from termek where gyarto='$gyarto'";
$eredmeny = mysqli_query($kapcsolat, $sqlmondat);
$uzenet = "<select id = 'darab' ><option value = '0'>Válasszon</option>";
while ($sor = mysqli_fetch_array($eredmeny)) {
    $uzenet = $uzenet."<option value='$sor[0]'>$sor[0]</option>";
}
$uzenet=$uzenet."</select>";
echo $uzenet;
?>