<?php 
include __DIR__. '/partials/Header.php';

if (isset($_GET['parking'])) {
    $parking = $_GET['parking'];
    if ($parking !== 'all') {
        foreach($hotels as $hotel_detail){
            if($hotel_detail['parking'] == (bool) $parking) {
                $temporary_array[] = $hotel_detail;
            }
        }
        $hotels = $temporary_array;
    }
}

if (isset($_GET['vote']) && $_GET['vote'] !== 'all') {
    $vote = intval($_GET['vote']);
    foreach($hotels as $hotel_detail){
        if($hotel_detail['vote'] >= $vote) {
            $temporary_array[] = $hotel_detail;
        }
    }
    $hotels = $temporary_array;
}

?>

<main class="container mb-3">
    <div class="card p-4 my-5">
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
                    <?php foreach($hotels as $hotel_detail) { ?>
                        <tr class="text-center">
                            <?php foreach($hotel_detail as $key => $value) { ?>
                                <?php if($key == 'parking' && $value === true) { ?>
                                    <td class="text-success">
                                        <i class="fa-solid fa-check"></i>
                                    </td>
                                <?php } elseif($value == false) { ?>
                                    <td class="text-danger">
                                        <i class="fa-solid fa-x"></i>
                                    </td>
                                <?php } else { ?>
                                <td>
                                    <?php echo $value ?>
                                </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
