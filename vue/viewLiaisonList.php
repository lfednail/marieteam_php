<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded space-y-5 my-10 ">
    <h2 class="text-3xl font-bold text-center mb-6">Liaisons</h2>
    <?php foreach ($liaisons as $l):?>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
            <div style="display: inline-block;">
                <h5>
                    <a class="text-blue-600 font-bold" href=<?= "liaisons/" . $l["id_Liaison"] ?> >
                        <?= $l["Lieu_depart"] . ' - ' . $l["Lieu_arrivee"] ?>
                    </a>
                </h5>
                <sub><?= $l["Distance_liaison"] ?> km</sub>
            </div>
            <div style="display: inline-block; float: right;">
                <button><a href="liaisons/edit/<?= $l["id_Liaison"] ?>" class="bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Edit</a></button>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>