<?php
//php et redirections (header) uniquement
function redirect($message, $page =null)
{

    $url = "index.php";
    if($page)
    {
        $url = "resultat.php";
    }
    header("Location: $url?message=$message");
    exit;
}

$users = [
    "luc"=> "motDePasseDeLuc4",
    "michel"=> "pasteque",
    "eglantine"=> "choucroute",
    "patricia"=> "surf"
];



if(empty($_POST['userName']) || empty($_POST['password'])) {
redirect("formulaire mal rempli");
}

$username = $_POST["userName"];
$password = $_POST["password"];

//utilisateur inconnu
if(!isset($users[$username])){
    redirect("utilisateur inconnu");
}


if($users[$username] != $password){
    redirect("mauvais mot de passe");
}

redirect("bienvenue, bien connecté","resultat.php");




//
//les bons utilisateurs et mot de passe
// peuvent se connecter, les autres sont renvoyés à l'accueil
//
//Sur une connection réussie, on renvoie vers la page résultat qui dit bravo.
//elle a un bouton déconnexion (retour accueil)
//
//JEUX SQL :
// https://sql-island.informatik.uni-kl.de/
//https://mystery.knightlab.com/
