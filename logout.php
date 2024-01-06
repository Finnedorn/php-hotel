<?php
// cliccando su logout starta una nuova sessione 
session_start();
//se è già presente un token e non è un elemento vuoto
//distruggi la sessione attuale e riportami ad index.php che però non avendo un token 
//adesso mi reindirizzerà a login.php
if (isset($_SESSION["auth_token"]) && $_SESSION["auth_token"] !== "") {
    session_destroy();
    header("Location: index.php");
    die();
}
//nel caso in cui non avessi un token portami comunque da index.php e conseguentemente a login.php
header("Location: index.php");
die();
?>