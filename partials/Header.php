<?php 
// e se volessi creare una pagina che necessita di un login?
// come fa php a gestire gli utenti loggati da quelli non loggati?
// inserendo session_start() apro una sessione in cui php metterà in memoria
// la sessione dei nostri utenti
// va sempre messo in cima al php della prima pagina in cui voglio aprire una sessione
session_start();

// includo l'array associativo da data.php
include __DIR__. '/../model/data.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="container my-3">
        <div class="py-3 px-4">
            <!-- creo un form che mi permetta di filtrare i risultati dell'array in data.php -->
            <!-- i check che regolano il form li determinerò nella pagina di index.php -->
            <form action="index.php" method="GET">
                <span>
                    parcheggio
                </span>
                <select name="parking">
                    <option value="all">-</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <span>voto</span>
                <select name="vote">
                    <option value="all">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" class="btn btn-success">Cerca</button>
            </form>
            <!-- inserisco un bottone che mi permetta di fare logout -->
            <button><a href="logout.php">logout</a></button>
        </div>
    </header>