<?php

use App\DB\BDD;

$db = new BDD();

$boatCruse = $db->select("select * from viewvoyageur");
$boatFret = $db->select("select * from viewfret");

?>

<!-- to the left -->
<div>
    <h3>Cruses</h3>

    <?php foreach ($boatCruse as $cruse):?>
        <?php $picture = $db->selectOne("Select * from image where id_Image = {$cruse['id_Image']}") ?>
        <?php $listEquipement = $db->select("Select * from viewliste_equipement wher id_Bateau = {$cruse['id_Bateau']}") ?>
        <div class="p-5">
            
            <img src="/marieteam_php/assets/<?= $picture['Nom_image'] . "." . $picture['Extension'] ?>" alt="image du bateau">
            <h5><?= $cruse['Nom_bateau']?></h5>
            <br>

            <p>Length: <?= $cruse['Longueur_bateau'] ?></p>
            <br>

            <p>Width: <?= $cruse['Largeur_bateau'] ?></p>
            <br>

            <p>Speed: <?= $cruse['Vitesse'] ?></p>
            <br>

            <p>Number of seats: <?= $cruse['Places'] ?></p>
            <br>

            <p>Equipement</p>
            <p>
                <?php foreach ($listEquipement as $e):?>
                    <?= $e['Lib_equipement'] . ': ' . $e['Quantite_equipement'] ?><br>
                <?php endforeach; ?>
            </p>
            <br>

        </div>
    <?php endforeach; ?>

</div>

<!-- to the right -->
<div>
    <h3>Fret</h3>

    <?php foreach ($boatFret as $fret):?>
        <div class="p-5">

            <h5><?= $fret['Nom_bateau']?></h5>

        </div>
    <?php endforeach; ?>

</div>