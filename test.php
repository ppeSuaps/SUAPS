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


$date = strtotime(date("Y-m-d"));
$premDimanche = strtotime(date('Y-m-d',strtotime("last Sunday")));
$derDimanche = date("Y-m-d", strtotime($premDimanche . " +13 day"));

$tab[]=array(array());

for($i=0;$i<=180;$i++)
{
    $jour = date('l',$premDimanche);
    switch ($jour) {
        case "Sunday":
            $jour="Dimanche";
            break;
        case "Monday":
            $jour="Lundi";
            break;
        case "Tuesday":
            $jour="Mardi";
            break;
        case "Wednesday":
            $jour="Mercredi";
            break;
        case "Thursday":
            $jour="Jeudi";
            break;
        case "Friday":
            $jour="Vendredi";
            break;
        case "Saturday":
            $jour="Samedi";
            break;
    }
    
    $mois= date('F',$premDimanche);
    switch ($mois) {
        case "January":
            $mois="Janvier";
            break;
        case "February":
            $mois="Février";
            break;
        case "March":
            $mois="Mars";
            break;
        case "April":
            $mois="Avril";
            break;
        case "May":
            $mois="Mai";
            break;
        case "June":
            $mois="Juin";
            break;
        case "July":
            $mois="Juillet";
            break;
        case "August":
            $mois="Août";
            break;
        case "September":
            $mois="Septembre";
            break;
        case "October":
            $mois="Octobre";
            break;
        case "November":
            $mois="Novembre";
            break;
        case "December":
            $mois="Décembre";
            break;
    }
    
    //     $chDate= $jour." ".date('j',$premDimanche)." ".$mois;
    $chDate= $jour." ".date('d',$premDimanche)."/".date('m',$premDimanche)."/".date('Y',$premDimanche)."\n";
    $tab[$i][0]=$chDate;
    $sql="SELECT * FROM utilisateur U JOIN reservation R ON U.idUtil=R.fk_idUtil WHERE datePrevu='".substr($tab[$i][0], -5, 4)."-".substr($tab[$i][0], -8, 2)."-".substr($tab[$i][0], -11, 2)."'";
    
    $req=$bdd->query($sql);
    while($row = $req->fetch()){
        array_push($tab[$i], $row['prenom']." ".$row['nom']);
        echo $row['prenom']." ".$row['nom'];
    }
    
    $premDimanche+=60*60*24; //On additionne d'un jour (en seconde)

}
 
print_r($tab);

?>