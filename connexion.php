<!DOCTYPE html>

<html lang="fr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Connexion SUPS </title>
    <link rel="stylesheet" media="" href="style.css">
</head>

<body>

<header>
	<h1> Bienvenue sur le service d'authentification du SUAPS </h1>
	<img class="suaps" src="img/img_suaps.png" alt="SUAPS" width="1600">
</header>

<main>

<nav>
	<ul>
		<li><a href="https://sport.unistra.fr/suaps/actualites/">Accueil</a></li>
		<li><a href="reservation.php">Réservation</a></li>
		<li><a href="aide.html">Aide</a></li>
		<li><a href="contact.html">Contact</a></li>
	</ul>
</nav>

<div class=div_logo_unistra>
	<a href="http://www.unistra.fr" title="Université de Strasbourg">
		<img class="logo_unistra" src="img/unistra_logo.png" alt="Université de Strasbourg" width="250">
	</a>
</div>

<div class="form">
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

<footer>
</footer>

</body>

</html>
