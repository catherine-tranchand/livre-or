<?php
session_start();
include('config.php');

if(!isset($_SESSION['id'])){
    header('Location: index.php');

}

if(isset($_POST['partager'])){
    if(!empty($_POST['commentaire'])){

        $com = htmlspecialchars($_POST['commentaire']);
        $idUser = $_SESSION['id'];
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i');
        var_dump($com);

        $insertCom = $conn->prepare("INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES (?, ?, ?)");
        $insertCom->execute(array($com, $idUser, $date));
    
}
    echo "Merci pour votre commentaire";
}

?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=style.css>
        <title>Commentaire</title>
    </head>

    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="livreor.php">Livre d'or</a>
           
        </nav>
    </header>

    <body>

 
	<p>Postez votre commentaire sur <br> l'experience avec l'Orient-Express!</p>

	<form action="" method="post" id="form" >  <!--The form with method "post" ---->
    <textarea name="commentaire" id="commentaire" cols="30" rows="10"
    placeholder="Commentaire" type="text" ></textarea>
    <input id="submit" type="submit" name="partager" value="Partager"><br>

    </form>
    
	
	</body>


<html>

