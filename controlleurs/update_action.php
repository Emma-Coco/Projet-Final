<?php

print_r($_POST);

//1. Créer un imput action pour les textarea
//2. Ici, faire un if (action 1 ou action 2?)
//3. Coder l'action 1 et coder l'action 2 => il s'agit d'update
//UPDATE NOM_De_La_Table SET Nom_de_la_colonne = NouvelleValeur WHERE (trouver un index)
if($_POST["action_id"]=="rouge"){
    echo 'rouge'.$_POST["action_entretien"]."<br/>";
}

if($_POST["action_id"]=="bleu"){
echo 'bleu'.$_POST["etat_action"]."<br/>";
}

?>