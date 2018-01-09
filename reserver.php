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

$jDateReserv=$_POST['jDateReserv'];
$mDateReserv=$_POST['mDateReserv'];
$yDateReserv=$_POST['yDateReserv'];



if($_POST['resa']!="----------------"){
    
    list($prenomInv, $nomInv) = explode(' ', $_POST['resa']);
    $sql = "SELECT * FROM utilisateur WHERE prenom='".$prenomInv."' AND nom='".$nomInv."'";
    $req = $bdd->query($sql);
    $row = $req->fetch();
    $id = $row['idUtil'];
    
    $sql2 = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, fk_idInv)
            VALUES ('".$_SESSION['pseudo']."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()), 'PERSO', NULL)";
    $bdd->exec($sql2);
    $sql3 = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, fk_idInv) 
            VALUES ('".$id."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()), 'INV', '".$_SESSION['pseudo']."')";
    $bdd->exec($sql3);
    
}else {
    $sql4 = "INSERT INTO reservation (fk_idUtil, datePrevu, dateReserv, type, fk_idInv)
            VALUES ('".$_SESSION['pseudo']."', '".$yDateReserv."-".$mDateReserv."-".$jDateReserv."', DATE(NOW()), 'PERSO', NULL)";
    $bdd->exec($sql4); 
}

header('Location: http://localhost/SUAPS/reservation.php');
exit();

?>