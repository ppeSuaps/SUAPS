<?php
session_start();

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=suaps;charset=utf8','root','');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
}
catch (Exception $e)
{
    
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
    
}

$desc=$_POST['resa'];
$jDateReserv=$_POST['jDateReserv'];
$mDateReserv=$_POST['mDateReserv'];
$yDateReserv=$_POST['yDateReserv'];


if($desc!="----------------"){
    $sql = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, description)
            VALUES ('".$_SESSION['pseudo']."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()), 'PERSO', ' ')";
    $bdd->exec($sql);
    $sql2 = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, description) 
            VALUES ('".$_SESSION['pseudo']."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()),'INV', 'Invité : ".$desc."')";
    $bdd->exec($sql2);
}else {
    $sql = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, description)
            VALUES ('".$_SESSION['pseudo']."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()),'PERSO', ' ')";
    $bdd->exec($sql);
    
}

// header('Location: http://localhost/SUAPS/reservation.php');
// exit();

?>