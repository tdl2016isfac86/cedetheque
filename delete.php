<?php
include('header.php');

if(isset($_GET['id'])) {
	$suppr = requete_sql("DELETE FROM cd WHERE id='".addslashes($_GET['id'])."'");
	}
	echo '<p>Suppression Réussie</p>';
?>	
<a href="index.php">Accueil</a>

<?php
include('footer.php');
?>
