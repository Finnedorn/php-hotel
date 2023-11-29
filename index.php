<?php 
include __DIR__. '/partials/Header.php';
?>

<main class="container mb-3">
    <div class="card p-4 my-5">
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
    </div>
</main>

<?php 
include __DIR__. '/partials/Footer.php';
?>
