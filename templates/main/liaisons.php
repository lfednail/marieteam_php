<?php

use App\DB\BDD;

$bdd = new BDD();

$listLiaisons = $bdd->select("Select * from liaison");

?>

<div class="flex" >

    <?php foreach ($listLiaisons as $liaison):?>
        <div class="p-5">

            <h5>
                <a href=<?= "liaisons/" . $liaison["id_Liaison"] ?> >
                    <?= $liaison["Lieu_depart"] . ' - ' . $liaison["Lieu_arrivee"] ?>
                </a>
            </h5>

            <sub><?= $liaison["Distance_liaison"] ?></sub>
        </div>
    <?php endforeach; ?>

</div>