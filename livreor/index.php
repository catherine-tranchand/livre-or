<?php
session_start();
include('config.php');

$userConnected = false;


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $userConnected = true;

    $recupUser = $conn->prepare("SELECT `login`  FROM `utilisateurs` WHERE id = '$id'");
    $recupUser->execute();
    $user = $recupUser->fetch(PDO::FETCH_ASSOC);
   
   
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=style.css href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/28029eb12b.js" crossorigin="anonymous"></script>

</head> 
    <title>Accueil</title>
</head>

<body>


        
<!-- PHP: If user is connected ... -->
<?php if($userConnected) { ?>

    <header>
        <nav>
            <a href="profil.php">Profil</a>
            <a href="livreor.php">Livre d'or</a>
            <a href="commentaire.php">Laisser un commmentaire</a>
            <a href="connexion.php?deco">Déconnection</a>
         
           
            
        </nav>
    </header>
    
    <main>
        <h1>Welcome on board, <b><?php echo $user['login'] . "!"; ?></b></h1>
    </main>

    


    <!-- PHP: If user is not connected ... -->
    <?php } else { ?>

    <header>
        <nav>
            <a href="index.php" active>Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">Créer un compte</a>
            <a href="livreor.php">Livre d'or</a>
        </nav>
    </header>

    <main>
        <h1>Welcome on board!<h1>
        </h1>
       
    </main>

    <?php } ?>  

  <?php include('footer.php'); ?>

 
</body>

</html>
