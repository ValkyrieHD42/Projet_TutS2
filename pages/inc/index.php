<?php // Page d'accueil -> Affiche le type et le nom de l'user ?>
<h1>Bienvenue <?php echo $_SESSION['login']; ?></h1>
<hr>
<p>Vous êtes connecté en tant que <?php echo $_SESSION['type_utilisateur'] ?></p>
<br>
<?php if($_SESSION['type_utilisateur'] == 'commercial'):?>
<p>Vous pouvez consulter vos projet dans les onglets à gauche</p>
<?php endif ?>
