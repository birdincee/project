<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=calender;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


/*$bdd = new mysqli('localhost','root','root','calender');*/

?>