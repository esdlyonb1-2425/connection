<?php
//php et redirections (header) uniquement
function redirect($message, $page =null)
{

    $url = "index.php";
    if($page)
    {
        $url = "articles.php";
    }
    header("Location: $url?message=$message");
    exit;
}

// motDePasseDeLuc4, patate, choucroute, surf
$users = [
    "luc"=> "53f8a9f698d7d2ea9c8a3a6c8d5ab698",
    "michel"=> "945e9f0b4e381b13aa70b94b89a28709",
    "eglantine"=> "4fa9239cbfe7d76a31bb46471ce6a976",
    "patricia"=> "353c8773694fbf1251dec54d98b614a1"
];



if(empty($_POST['userName']) || empty($_POST['password'])) {
redirect("formulaire  mal rempli");
}

$username = $_POST["userName"];
$unEcryptedPassword = $_POST["password"];
$hashedPassword = md5($unEcryptedPassword);

//utilisateur inconnu
if(!isset($users[$username])){
    redirect("utilisateur inconnu");
}


if($users[$username] != $hashedPassword){
    redirect("mauvais mot de passe");
}

redirect("bienvenue, bien connecté","articles.php");




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
