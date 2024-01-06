<?php
// la pagina di logIn 

//includo l'header dove ho aperto la sessione 
include __DIR__ ."/partials/Header.php";
//includo il il file dove ho inserito la funzione che regola 
// tutti i passaggi del login che mi permetteranno di 
//sbloccare l'accesso ad index.php
include __DIR__ ."/functions/functions.php";

//richiamo la funzione così da poterla utilizzare 
$error = logIn();
?>

<main class="d-flex align-items-center justify-content-center py-4 bg-body-tertiary ">
    <!-- se la funzione producesse un errore verrebbe riportato qua -->
    <?php if ($error) { ?>
        <div class="text-danger bg-danger">
            <?php echo $error ?>
        </div>
    <?php } ?>

    <!-- creo un form che accolga una mail ed una password  -->
    <!-- in questo caso userò il metodo POST in quanto essendo dati privati -->
    <!-- non voglio che questi vadano a finire nell'URL come avviene con GET -->
    <!-- inoltre di default non vengono salvati nel browser e questo mi permette -->
    <!-- di salvaguardare la privacy dell'utente -->

    <!--il metodo $_SERVER['PHP_SELF'] si traduce in rimandamelo a me stesso in quanto server-->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email">
            <label for="email">mail address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password">
            <label for="password">password</label>
        </div>
        <button type="submit">sign</button>
    </form>
</main>

<?php
// includo il footer
include __DIR__ ."/partials/Footer.php";
?>