<?php

$boatCruse = $db->select("select * from viewvoyageur");
$boatFret = $db->select("select * from viewfret");

?>

<div class="flex" >
    <h3>Cruises</h3>

    <?php foreach ($boatCruse as $cruse):?>
        <div class="p-5">

            <h5>
                <a href=<?= "liaisons/" . $liaison["id_Liaison"] ?> >
                    <?= $liaison["Lieu_depart"] . ' - ' . $liaison["Lieu_arrivee"] ?>
                </a>
            </h5>

            <sub><?= $liaison["Distance_liaison"] ?> km</sub>
        </div>
    <?php endforeach; ?>

</div>