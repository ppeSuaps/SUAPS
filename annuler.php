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

$jDateAnnul=$_POST['jDateAnnul'];
$mDateAnnul=$_POST['mDateAnnul'];
$yDateAnnul=$_POST['yDateAnnul'];


if ($_POST['invOuPas'] == '1'){
    $sql="DELETE FROM reservation WHERE datePrevu='".$yDateAnnul."-".$mDateAnnul."-".$jDateAnnul."' AND fk_idInv='".$_SESSION['pseudo']."'";
    $bdd->exec($sql);
}else{
    $sql2="DELETE FROM reservation WHERE datePrevu='".$yDateAnnul."-".$mDateAnnul."-".$jDateAnnul."' AND fk_idUtil='".$_SESSION['pseudo']."'";
    $bdd->exec($sql2);
    $sql3="DELETE FROM reservation WHERE datePrevu='".$yDateAnnul."-".$mDateAnnul."-".$jDateAnnul."' AND fk_idInv='".$_SESSION['pseudo']."'";
    $bdd->exec($sql3);
}

header('Location: http://localhost/SUAPS/reservation.php');
exit();

?>