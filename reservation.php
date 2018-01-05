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

$sql="select * FROM identifiant WHERE idCompte='".$id."' AND mdp='".$mdp."'";
$req = $bdd->query($sql);

if ($row = $req->fetch()) {
    do {
        
    } while ($row = $req->fetch());
} else {
    ?>
    <script type="text/javascript">
    alert('Le nom d\'utilisateur ou le mot de passe est incorrect. Veuillez réessayer');
    location="connexion.php";
    </script>
    <?php
    exit();
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
    $sql="select * FROM utilisateur U JOIN reservation R ON U.idUtil=R.fk_idUtil WHERE datePrevu='".substr($tab[$i][0], -5, 4)."-".substr($tab[$i][0], -8, 2)."-".substr($tab[$i][0], -11, 2)."'";
    
    $req=$bdd->query($sql);
    while($row = $req->fetch()){
        array_push($tab[$i], $row['prenom']." ".$row['nom']);
    }
    
    $premDimanche+=60*60*24; //On additionne d'un jour (en seconde)
    
}

$sql2="select * FROM utilisateur WHERE idUtil='".$id."'";
$req2 = $bdd->query($sql2);
$row2=$req2->fetch();

$prenom=$row2['prenom'];
$nom=$row2['nom'];
$nbTickSem=$row2['nbTickDispoSem'];
$nbTickWe=$row2['nbTickDispoWe'];
$nbParc=$row2['nbParcTot'];
$nbRes=$row2['nbReserv'];
$nbAnnul=$row2['nbTickAnnul'];
$nbInv=$row2['nbInv'];

$sql3="select * FROM utilisateur WHERE estMembre=0";
$req3 = $bdd->query($sql3);

?>

<!DOCTYPE html>

<html lang="fr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Réservation SUAPS </title>
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
        <li class="icone"><a href="https://sport.unistra.fr/suaps/actualites/" title="Accueil SUAPS"><i class="fa fa-home fa-2x"></i></a></li>
        <li><b><a href="reservation.php" title="Réservation">Réservation</a></b></li>
        <li><b><a href="aide.html" title="Aide">Aide</a></b></li>
        <li><b><a href="contact.html" title="Contact">Contact</a></b></li>
        <li class="icone"><a href="connexion.php" title="Déconnexion""><i class="fa fa-power-off fa-2x"></i></a></li>
    </ul>
</nav>

<div class="profil">
	<br>
	<h4><?php echo $prenom." ".$nom ;?></h4>
	<p> Golfeur</p>
	<p> Tickets SEM : <?php echo $nbTickSem?> </p>
	<p> Tickets WE : <?php echo $nbTickWe?>  </p>
	<p> Parcours : <?php echo $nbParc?>  </p>
	<p> Réservations : <?php echo $nbRes?>  </p>
	<p> Annulations : <?php echo $nbAnnul?>  </p>
	<p> Invitations : <?php echo $nbInv?>  </p>
	<br>
	<img src="img/golf.png" width="200">
	
	
</div>

<div class="tab">
	<h2>Planning des réservations</h2>

<!-- 	<div class="div_reculer"> -->
<!-- 		<button class="reculer"><span>« Reculer</span></button> -->
<!-- 	</div> -->
<!-- 	<div class="div_avancer"> -->
<!-- 		<button class="avancer"><span>Avancer »</span></button> -->
<!-- 	</div> -->
	
	<div class="conteneur">
    <table>
    
       <thead> <!-- En-tête du tableau -->
           <tr>
               <th><?php echo "Date";?></th>
               <th>Joueur 1</th>
               <th>Joueur 2</th>
               <th>Joueur 3</th>
               <th>Joueur 4</th>
               <th>Rés.</th>
           </tr>
       </thead>
    
       <tbody> <!-- Corps du tableau -->
          	<?php 
          	$i=0;
          	while($i<=180){
          	    if(substr($tab[$i][0], 0, 8)=="Dimanche" || substr($tab[$i][0], 0, 6)=="Samedi"){
          	         ?><tr style="background-color: #ABABAB"><?php 
          	    }else{
          	         ?><tr><?php 
          	    }?>
          			<td><?php echo $tab[$i][0]; ?></td>
          			<td>
          				<?php 
          				if(isset($tab[$i][1])){ 
          			       echo $tab[$i][1];
          			    }else{
          			       echo "";
          			    }
          			    ?>
          			</td>
          			<td>
          				<?php 
          				if(isset($tab[$i][2])){
          				    echo $tab[$i][2];
          				}else{
          				    echo "";
          				}
          			    ?>
          			</td>  
          			<td>
          				<?php 
          				if(isset($tab[$i][3])){
          				    echo $tab[$i][3];
          				}else{
          				    echo "";
          				}
          			    ?>
          			</td>  
          			<td>
          				<?php 
          				if(isset($tab[$i][4])){
          				    echo $tab[$i][4];
          				}else{
          				    echo "";
          				}
          			    ?>
          			</td>  
          			<td align="center">
          				<?php 
          				if(!isset($tab[$i][4])){
          				    ?><i class="fa fa-check fa-1,5x" style="color: green"><?php
          				}else{
          				    ?><i class="fa fa-close fa-1,5x" style="color: red"><?php
          				}
          			    ?>
          			</td>
          		</tr> 
          	<?php 
          	$i=$i+1;
          	}
          	?>
       </tbody>
    </table>
    </div>
    
</div>

<div class = "res" >
	<form method="post" action="reserver.php">
	<div class = "inv">
	<h2>Réserver</h2>
		<p for="resa">Invité</p>
        <select name="resa" size="1">
        	<option>----------------</option>
        	<?php 
        	while($row3=$req3->fetch()){
        	    ?><option><?php echo $row3['prenom'].' '.$row3['nom']?></option><?php
        	}
        	?>
		</select>
	</div>

	<div class = "dateReserv">
		<p for="dateReserv">Date</label>
		<br>
        <select class="date" name="jDateReserv" size="1">
			<?php 
			$i=1;
			while($i<=31){
			    ?><option><?php echo sprintf( "%02d", $i );
			    $i=$i+1;
			}
			?>
		</select>
		<select class="date" name="mDateReserv" size="1">
			<?php 
			$i=1;
			while($i<=12){
			    ?><option><?php echo sprintf( "%02d", $i );
			    $i=$i+1;
			}
			?>
		</select>
		<select class="date" name="yDateReserv" size="1">
			<?php 
			$i=2018;
			while($i<=2028){
			    ?><option><?php echo $i;
			    $i=$i+1;
			}
			?>
		</select>
	
	<div class="div_btnreserv">
		<button class="reserver"><span>Réserver</span></button>
	</div>
	</form>
	</div>
	
	<div class="annuler">
		<form method="post" action="annuler.php">
		<h2>Annuler</h2>
        <p for="dateAnnul">Date</p>
        <select class="date" name="jDateAnnul" size="1">
			<?php 
			$i=1;
			while($i<=31){
			    ?><option><?php echo sprintf( "%02d", $i );
			    $i=$i+1;
			}
			?>
		</select>
		<select class="date" name="mDateAnnul" size="1">
			<?php 
			$i=1;
			while($i<=12){
			    ?><option><?php echo sprintf( "%02d", $i );
			    $i=$i+1;
			}
			?>
		</select>
		<select class="date" name="yDateAnnul" size="1">
			<?php 
			$i=2018;
			while($i<=2028){
			    ?><option><?php echo $i;
			    $i=$i+1;
			}
			?>
		</select>
		<div class="checkbox">
			<p><input class="invOuPas"  name="invOuPas" type="checkbox"> Uniquement l'invité ?</input></p>
		</div>
		<div class="div_btnAnnul">
			<button class="annul"><span>Confirmer</span></button>
		</div>
		</form>
	</div>
</div>

</main>

<footer>

</footer>

</body>
</html>

