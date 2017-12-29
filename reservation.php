<?php

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

$id = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$sql="SELECT * FROM identifiant WHERE idCompte='".$id."' AND mdp='".$mdp."'";
$req = $bdd->query($sql);

if ($row = $req->fetch()) {
    do {
        echo 'YESs';
    } while ($row = $req->fetch());
} else {
    echo 'NO';
}

?>

