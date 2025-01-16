<?php

$listLiaisons = $db->select("select * from liaison");

?>

<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded space-y-5 my-10 ">
    <h2 class="text-3xl font-bold text-center mb-6">Crossings</h2>
    <?php foreach ($listLiaisons as $liaison):?>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">

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
    <br>
    <?php endforeach; ?>
</div>
<?php if(isset($_SESSION['user'])):?>
    <?php if(($_SESSION['users']['Role'] = "admin") || ($_SESSION['users']['Role'] = "Admin")):?>
        <button><a href="liaisons/create">Create liaison</a></button>
    <?php endif;?>
<?php endif;?>