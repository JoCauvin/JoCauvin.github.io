<?php


if(isset($_SESSION['pseudo']))
{
    error_log('qqn s\'est connecté');
}
else
{
    setcookie('pseudo', 'JONATHAN', time() + 30*24*3600);
    setcookie('id', '1', time() + 30*24*3600);
    $_SESSION["pseudo"]='JONATHAN';
    $_SESSION["projects"][0]='TESTA1';
    $_SESSION["projects"][1]='TESTA2';
    $_SESSION["projects"][2]='TESTA3';
    $_SESSION["FRIENDS"][0]='2';
    $_SESSION["FRIENDS"][1]='3';
    $_SESSION["FRIENDS"][2]='4';
}

?>