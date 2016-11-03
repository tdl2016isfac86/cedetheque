<?php

include('header.php');

if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
else {
	$page = 1;
}
if(isset($_GET['nb_resultats'])) {
	$_SESSION['nb_resultats'] = $_GET['nb_resultats'];
}
if(isset($_SESSION['nb_resultats'])) {
	$nb_resultats = $_SESSION['nb_resultats'];
}
else {
	$nb_resultats = 20;
}

?>
<h1>Bienvenue dans la Cédéthèque</h1>

<section>
	<h2>Liste des CD's</h2>
	<a href="index.php?nb_resultats=5">Voir 5 résultats par page</a>
	<a href="index.php?nb_resultats=10">Voir 10 résultats par page</a>
	<a href="index.php?nb_resultats=15">Voir 15 résultats par page</a>
	<a href="index.php?nb_resultats=20">Voir 20 résultats par page</a>
	<?php
$liste_cds = requete_sql("
	SELECT *
	FROM cd
	ORDER BY artist, title
	LIMIT ".(($page-1)*$nb_resultats).",".$nb_resultats);
echo '<ul class="list">';
while($i=mysql_fetch_assoc($liste_cds)) {
	echo '<li><a href="edit.php?id='.$i['id'].'">'.$i['artist'].''.$i['title'].'</a>'.' - <a href="delete.php?id='.$i['id'].'">⚔</a></li>';
}
echo '</ul>';

$res = requete_sql("SELECT count(*) as total from cd");
$array = mysql_fetch_assoc($res);
$total = $array['total'];

//$total = mysql_fetch_assoc(requete_sql("SELECT count(*) as total from cd"))['total'];
$nbpages = ceil($total/$nb_resultats);
if($page > 1) {
	echo '<a href ="index.php?page='.($page-1).'">Page précédente</a> ::: ';
}
for($i=1; $i<=$nbpages; $i++) {
	if($i != 1) {
		echo ' - ';
	}
	if($page == $i) {
		echo 'Page '.$i;
	}
	else {
		echo '<a href ="index.php?page='.$i.'">Page '.$i.'</a>';
	}
}
if($page < $nbpages) {
	echo ' ::: <a href ="index.php?page='.($page+1).'">Page suivante</a>';
}
?>
</section>
<nav>
	<ul>
		<li><a href="index.php">Accueil</a></li>
		<li><a href="add.php">Ajouter un album</a></li>
	</ul>
</nav>


<?php
include('footer.php');
?>