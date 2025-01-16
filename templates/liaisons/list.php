<?php

$listLiaisons = $db->select("select * from liaison");

?>

<div class="flex" >

    <?php foreach ($listLiaisons as $liaison):?>
        <div class="p-5">

            <h5>
                <a href=<?= "liaisons/" . $liaison["id_Liaison"] ?> >
                    <?= $liaison["Lieu_depart"] . ' - ' . $liaison["Lieu_arrivee"] ?>
                </a>
            </h5>

            <sub><?= $liaison["Distance_liaison"] ?> km</sub>
            <?php if(isset($_SESSION['user'])):?>
                <?php if(($_SESSION['users']['Role'] = "admin") || ($_SESSION['users']['Role'] = "Admin")):?>
                    <button><a href="liaisons/edit/<?= $liaison["Lieu_arrivee"] ?>">Edit</a></button>
                <?php endif;?>
            <?php endif;?>


        </div>
    <?php endforeach; ?>
</div>
<?php if(isset($_SESSION['user'])):?>
    <?php if(($_SESSION['users']['Role'] = "admin") || ($_SESSION['users']['Role'] = "Admin")):?>
        <button><a href="liaisons/create">Create liaison</a></button>
    <?php endif;?>
<?php endif;?>