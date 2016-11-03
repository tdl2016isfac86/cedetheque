<?php
include('header.php');

if(isset($_GET['id'])) {
	$rec = requete_sql("
		SELECT * FROM cd WHERE id='".$_GET['id']."'
			");
	$i = mysql_fetch_assoc($rec);
	$title = $i['title'];
	$artist = $i['artist'];
	$playlist= $i['playlist'];
	$nb_tunes = $i['nb_tunes'];
	$id = $i['id'];
}

elseif(isset($_POST['title'])) {
	
	$maj = requete_sql("UPDATE cd 
	SET title = '".addslashes($_POST['title'])."',
	artist = '".addslashes($_POST['artist'])."',
	playlist = '".addslashes($_POST['playlist'])."',
	nb_tunes = '".addslashes($_POST['nb_tunes'])."'
	WHERE id ='".$_POST['id']."'");

	echo 'MAJ Réussie';
}Albu


?>

<form action="edit.php" method="post">
<label for="title"> Titre de l'album :</label>
<input type="text" name="title" value="<?php echo $title; ?>">
<label for="artist"> Artiste :</label>
<input type="text" name="artist" value="<?php echo $artist; ?>">
<label for="playlist">Liste de Lecture :</label>
<textarea name="playlist" col="150" row="20" placeholder="Titres"><?php
echo $playlist;	
?></textarea>
<label for="nb_tunes"> Nombre de Pistes :</label>
<input type="text" name="nb_tunes" value="<?php echo $nb_tunes; ?>">
<input type="submit" name="submit" value="Modification">
</form>

<nav>
	<ul>
		<li><a href="index.php">Accueil</a></li>
		<li><a href="add.php">Ajout</li>
	</ul>
</nav>
</form>

<?php
include('footer.php');
?>

