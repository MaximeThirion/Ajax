<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=alaji;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->query("SELECT * FROM stagiaire WHERE selected = 'false' ORDER BY RAND() LIMIT 1");

    $stagiaire = $reponse->fetch();

    if ($stagiaire) {

        $id_stagiaire = $stagiaire['id'];

        echo $stagiaire['prenom'];

        $bdd->query("UPDATE stagiaire SET selected = 'true' WHERE id = $id_stagiaire");

        $reponse->closeCursor();
    } else {

        $bdd->query("UPDATE stagiaire SET selected = 'false'");

        echo('Réinitialisation');
    }
?>