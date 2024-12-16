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

            <sub><?= $liaison["Distance_liaison"] ?></sub>
            <?php if(isset($_SESSION['user'])): ?>
                <?php if($_SESSION['user']['Role']): ?>
                        <button href="laisons/edit">Edit</button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php if(isset($_SESSION['user'])): ?>
        <?php if($_SESSION['user']['Role']): ?>
            <button href="liaisons/create">Add a liaison</button>
        <?php endif; ?>
    <?php endif; ?>

</div>