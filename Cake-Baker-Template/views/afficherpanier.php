<?PHP
include "../core/panier.php";
$panier1=new panier();
$listepanier=$panier1->afficherpanier();

//var_dump($listeEmployes->fetchAll());
?>


<?PHP
foreach($listepanier as $row){
	?>
	<tr>
	<td><?PHP echo $row['ref']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['point']; ?></td>
	<td><form method="POST" action="supprimerpanier.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
	</form>
	</td>
	<td><a href="modifierpanier.php?cin=<?PHP echo $row['ref']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>


