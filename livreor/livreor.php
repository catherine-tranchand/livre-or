<?php
session_start();
include('config.php');

//login=htmlspecialchars($_POST['login']);
//$commentaire=htmlspecialchars($_POST['commentaire']);


$viewdb = $conn->prepare("SELECT `login`, `commentaire`, `date` FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC");
$viewdb->execute();

$res = $viewdb->fetchAll(PDO::FETCH_ASSOC);

//var_dump($res);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livreor</title>
</head>


<body>

<header>
        <nav>
            <a href="index.php" active>Accueil</a>
            <a href="profil.php">Profil</a>
            <a href="connexion.php?deco">Déconnection</a>
        </nav>
    </header>

<section class="style">
    <?php foreach ($res as $value) : ?>
    
    <div class="commentaire">
        <p> Posté par <?php echo $value['login'] ?> le <?php echo $value['date'] ?></p>

        <p> <?php echo $value['commentaire'] ?> </p>
    </div>
    
    <?php endforeach; ?>


</section>
    
</body>
</html>
