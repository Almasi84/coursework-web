<?php
    include './csatolt.php';
    $sqlmondat="SELECT * FROM user WHERE username=\"".$_POST['fnev']."\" and password=\"".sha1($_POST['jelszo'])."\"";
    $eredmeny=mysqli_query($kapcsolat, $sqlmondat);
    if (mysqli_num_rows($eredmeny) == 1){
        $rekord=mysqli_fetch_assoc($eredmeny);
        $_SESSION['fnev']=$rekord['username'];
        $_SESSION['nev']=$rekord['nev'];
        $_SESSION['jogosultsag']=$rekord['jog'];
        echo $_SESSION['nev'];
    } else {
        echo "sikertelen bejelentkezés";
    }
?>