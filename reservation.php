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

/*if ($row = $req->fetch()) {
 do {
 echo 'YES';
 } while ($row = $req->fetch());
 } else {
 echo 'NO';
 }*/

$date = strtotime(date("Y-m-d"));
$premDimanche = strtotime(date('Y-m-d',strtotime("last Sunday")));
$derDimanche = date("Y-m-d", strtotime($premDimanche . " +13 day"));

$tab[]=array();

for($i=0;$i<=13;$i++)
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
    
    $chDate= $jour." ".date('j',$premDimanche);
    array_push($tab, $chDate);
    
    $premDimanche+=60*60*24; //On additionne d'un jour (en seconde)
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Connexion SUAPS </title>
    <link rel="stylesheet" media="" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<header>
	<img class="suaps" src="img/img_suaps.png" alt="SUAPS" width="1600">
</header>

<main>

<nav>
    <ul>
        <li class="icone"><a href="https://sport.unistra.fr/suaps/actualites/"><i class="fa fa-home fa-2x"></i></a></li>
        <li><b><a href="reservation.php">Réservation</a></b></li>
        <li><b><a href="aide.html">Aide</a></b></li>
        <li><b><a href="contact.html">Contact</a></b></li>
        <li class="icone"><a href="connexion.php"><i class="fa fa-power-off fa-2x"></i></a></li>
    </ul>
</nav>

<div class="profil">
	<br>
	<h4>Prénom NOM</h4>
	<p> Golfeur</p>
	<p> Tickets SEM : ?? </p>
	<p> Tickets WE : ?? </p>
	<p> Parcours : ?? </p>
	<p> Réservations : ?? </p>
	<p> Annulations : ?? </p>
	<p> Invitations : ?? </p>
	
	
</div>

<div class="tab">
	<h2>Planning des réservations</h2>

	<div class="div_reculer">
		<button class="reculer"><span>« Reculer</span></button>
	</div>
	<div class="div_avancer">
		<button class="avancer"><span>Avancer »</span></button>
	</div>

<table width="60%" height="10%">

   <thead> <!-- En-tête du tableau -->
       <tr>
           <th><?php echo date('F',$premDimanche);?></th>
           <th>Joueur 1</th>
           <th>Joueur 2</th>
           <th>Joueur 3</th>
           <th>Joueur 4</th>
           <th>Rés.</th>
       </tr>
   </thead>

   <tbody> <!-- Corps du tableau -->
      	<?php 
      	$i=1;
      	while($i<=14){
      	?>	<tr>
      			<td width="20%" height="30px"><?php echo $tab[$i]; ?></td>
      			<td></td>
      			<td></td>  
      			<td></td>  
      			<td></td>  
      			<td></td>
      		</tr> 
      	<?php 
      	$i=$i+1;
      	}
      	?>       
   </tbody>
</table>
    
</div>

<div class = "res" >
	<div class = "nomRes">
	<br><br>
		<label for="resa">Réservation</label>
		<br>
        <SELECT name="resa" size="1">
			<OPTION>lundi
			<OPTION>mardi
			<OPTION>mercredi
			<OPTION>jeudi
			<OPTION>vendredi
		</SELECT>
	</div>
	
	<div class = "invit">
	<br>
		<label for="inv">Invité</label>
		<br>
        <SELECT name="inv" size="1">
			<OPTION>lundi
			<OPTION>mardi
			<OPTION>mercredi
			<OPTION>jeudi
			<OPTION>vendredi
		</SELECT>
	</div>
	
	<div class = "date">
	<br>
		<label for="date">Date</label>
		<br>
        <SELECT name="date" size="1">
			<OPTION>lundi
			<OPTION>mardi
			<OPTION>mercredi
			<OPTION>jeudi
			<OPTION>vendredi
		</SELECT>
	</div>
</div>

</main>

<footer>

</footer>

</body>
</html>

