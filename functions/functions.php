<?php 
// dopo aver inviato i dati di mail e psw entra in gioco la funzione 
function logIn() {
    // se ho valori dai form mail e psw e questi sono diversi da caselle vuote
    if ((isset($_POST["email"]) && $_POST["email"] !== "") && (isset($_POST["password"]) && $_POST["password"] !== "")) {
        //attribuiscimeli alle variabili $email e $password
        $email = $_POST["email"];
        $password = $_POST["password"];
        //dopodichè entra in gioco la funzione di controllo psw
        $error = checkPsw($password);
        // se error è true e quindi la psassword settata è minore di 6 caratteri
        //riporta error (avendo return la funzione automenticamente si interrompe)
        if($error) {
            return $error;
        }
        // se error rimane false e la password è maggiore di 6 caratteri
        // io utente riceverò un token di autenticazione pari ad un numero randomico+$email
        //aprire una sessione significa poter utilizzare $_SESSION
        //esso è un array associativo che contiene tutte le info della sessione
        $_SESSION['auth_token'] = rand(10000,999999) . $email;
        //header non si riferisce all'elemento html ma è una funzione che mi reindirizza 
        //ad un apagina ed in questo caso all'index.php a cui avrò accesso
        //in quanto possessore di un token
        header('Location: index.php');
    }
    //e se ho già un token ? beh portami direttamente all'index.php
    if(isset($_SESSION['auth_token'])) {
        header('Location: index.php');
    }
}

function checkPsw($pass) {
    //se il valore della variabile che contiene il dato dal form password
    //è inferiore a 6 caratteri
    //la variabile $error avrà valore di un messaggio di errore 
    //altrimenti error è false
    if(strlen($pass) < 6) {
        $error = 'password must be at least 6 character';
        return $error;  
    } else {
        return false;
    }
}

?>