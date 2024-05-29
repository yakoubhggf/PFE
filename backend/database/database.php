<?php 
    try {   
        $serveur = "localhost";
        $utilisateur = "root"; 
        $motdepasse = ""; 
        $basededonnees = "rental_car"; 
        $db=new PDO ("mysql:host={$serveur};
                    dbname={$basededonnees}",
                    $utilisateur,
                    $motdepasse);
    }
    catch (PDOException $e){
        echo 'the connexion to the database has been failed'.'<br>';
        echo $e->getMessage();
    }
    ?>