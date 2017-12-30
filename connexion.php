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
	
	<a href="https://sport.unistra.fr/suaps/actualites/" title="Actualités - Service des Sports - Université de Strasbourg">
		<img class="suaps" src="img/img_suaps.png" alt="SUAPS" width="1600">
	</a>
</header>

<main>

<div class=div_logo_unistra>
	<a href="http://www.unistra.fr" title="Université de Strasbourg">
		<img class="logo_unistra" src="img/unistra_logo.png" alt="Université de Strasbourg" width="250">
	</a>
</div>

<div class="form">
	<h2><i>Bienvenue sur le service d'authentification du SUAPS </i></h2>
    <form method="post" action="reservation.php">
    	<label for="pseudo">Identifiant</label>
        <input type="text" name="pseudo" id="pseudo" />
        <br/><br/>
        <label for="mdp">Mot de passe</label>
        <input type="Password" name="mdp" id="Mdp" />
        <br/><br/>
        <button class="button" style="vertical-align:middle"><span> Se connecter </span></button>
    </form>
</div>

<div class=div_logo_cassin>
	<a href="http://www.lyceecassin-strasbourg.eu" title="Lycée René Cassin">
		<img class="logo_cassin" src="img/cassin_logo.png" alt="Lycée René Cassin" width="200">
	</a>
</div>

</main>


</body>


