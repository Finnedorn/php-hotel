<?php
//includo l'header
include __DIR__. '/partials/Header.php';

//creo un check che se non ho alcun valore per il token 
//per questa sessione 
//allora vengo reindirizzato alla pagina di login.php
//è il modo con cui di default non permettiamo agli utenti non iscritti 
//di avere accesso alla pagina
if (!isset($_SESSION['auth_token'])) {
    header('Location: login.php');
    //exit è un comando di php che mi chiude l'esecuzione di uno script
    //un comando alternativo è die()
    exit;
}

//imposto i check che regolino il mio form di ricerca di hotel filtrando dall'array associativo


//se ho un value per la select "parking"
if (isset($_GET['parking'])) {
    //attribuiscila alla var $parking
    $parking = $_GET['parking'];

    //metodo 1:
    //se il valore di $parking è diveros dal valore di default del select
    //creami un array $temporary_array
    //cicla tutte le key in hotel
    //se il valore della key è uguale al valore booleano di $parking
    //aggiungila all'array

    //ovvero se il value di $parking è 1 e quindi true inserisci in $temporary_array tutti
    //gli elementi che hanno la key parking settata su true

    //l'array associativo sarà uguale al temporary array

    // if ($parking !== 'all') {
    //     $temporary_array = [];
    //     foreach($hotels as $hotel_detail){
    //         if($hotel_detail['parking'] == (bool) $parking) {
    //             $temporary_array[] = $hotel_detail;
    //         }
    //     }
    //     $hotels = $temporary_array;
    // }



    // metodo 2:
    // array_filter è una funzione che mi permette di passare in rassegna ogni elemento di un array
    // filtrandolo attraverso una funzione di callback 
    //in questo caso, passa per tutti gli elementi di $hotel e designa solo quelli 
    //i cui valori di key parking sono uguali a quello della variabile $parking
    // oppure dammi tutti i valori   

    $hotels = array_filter($hotels, fn($item) => $item['parking'] == $parking || $parking == 'all');
}

if (isset($_GET['vote']) && $_GET['vote'] !== 'all') {
    $vote = intval($_GET['vote']);
    // $temporary_array = [];
    // foreach($hotels as $hotel_detail){
    //     if($hotel_detail['vote'] >= $vote) {
    //         $temporary_array[] = $hotel_detail;
    //     }
    // }
    // $hotels = $temporary_array;
    $hotels = array_filter($hotels, fn($item) => $item['vote'] == $vote);
}

?>

<main class="container mb-3">
    <div class="card p-4 my-5">
        <!-- se gli elementi di $hotels sono maggiori di 0 allora mostrameli in tabella -->
        <?php if(count($hotels) > 0) { ?>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Voto</th>
                        <th scope="col">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>
                    <!--creo un check che mi dia un segno positivo nel caso in cui abbia il parcheggio  -->
                    <!-- o viceversa in caso contrario -->
                    <!-- ciclo tutti gli elementi in $hotels stavolta speicificando il value della key -->
                    <!-- in quanto mi servirà in seguito per il check -->
                    <?php foreach($hotels as $hotel_detail) { ?>
                        <tr class="text-center">
                            <?php foreach($hotel_detail as $key => $value) { ?>
                                <!-- se la key parking è presente e se il key value è true  -->
                                <?php if($key == 'parking' && $value === true) { ?>
                                    <td class="text-success">
                                        <i class="fa-solid fa-check"></i>
                                    </td>
                                <!-- e se il key value è false  -->
                                <?php } elseif($value == false) { ?>
                                    <td class="text-danger">
                                        <i class="fa-solid fa-x"></i>
                                    </td>
                                <?php } else { ?>
                                <!-- se non è nè true nè false stampamelo -->
                                <td>
                                    <?php echo $value ?>
                                </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <!-- altrimenti se il filtraggio riducesse tutti gli elementi di $hotels a 0 mostrami un messaggio -->
        <?php } else { ?>
            <div class="m-auto">
                Non ci sono risultati per questa ricerca!
            </div>
        <?php } ?>
    </div>
</main>

<?php 
include __DIR__. '/partials/Footer.php';
?>
