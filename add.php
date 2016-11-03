<?php
include('header.php');

if(isset($_POST['title'])) {
	$ajout = requete_sql("
				INSERT INTO cd VALUES (
				NULL,
				'".addslashes($_POST['title'])."',
				'".addslashes($_POST['artist'])."',
				'".addslashes($_POST['playlist'])."',
				'".addslashes($_POST['nb_tunes'])."'
				)");

	echo '<p>Ajout Réussi</p>';
	
	}
?>

<form action="add.php" method="post">
<label for="title"> Titre de l'album :</label>
<input type="text" name="title">
<label for="artist"> Artiste :</label>
<input type="text" name="artist">
<label for="playlist">Liste de Lecture :</label>
<textarea name="playlist" col="150" row="20" placeholder="Titres"></textarea>
<label for="nb_tunes"> Nombre de Pistes :</label>
<input type="number" name="nb_tunes">
<input type="submit" name="submit" value="Ajout">
</form>

<a href="index.php">Accueil</a>

<?php
include('footer.php');
?>