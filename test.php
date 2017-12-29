<?php

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
            $jour="Samedii";
            break;
    }
    
    $chDate= $jour." ".date('j',$premDimanche);
    echo $chDate;
    array_push($tab, $chDate);
    
    $premDimanche+=60*60*24; //On additionne d'un jour (en seconde)
    echo'<br />' ;
}
print_r($tab)

?>

<table>
   <caption>PLANNING DE RESERVATION</caption>

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
      			<td><?php echo $tab[$i]; ?></td>
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