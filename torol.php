<?php
if (isset($_COOKIE['rendeles'])){
    unset($_COOKIE['rendeles']);
    setcookie('rendeles', null, -1, '/');
    echo "";
}