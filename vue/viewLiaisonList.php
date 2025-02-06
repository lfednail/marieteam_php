<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded space-y-5 my-10 ">
    <h2 class="text-3xl font-bold text-center mb-6">Liaisons</h2>
    <?php foreach ($liaisons as $l):?>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">

            <h5>
                <a class="text-blue-600 font-bold" href=<?= "liaisons/" . $l["id_Liaison"] ?> >
                    <?= $l["Lieu_depart"] . ' - ' . $l["Lieu_arrivee"] ?>
                </a>
            </h5>

            <sub><?= $l["Distance_liaison"] ?> km</sub>
            <button><a href="liaisons/edit/<?= $l["id_Liaison"] ?>">Edit</a></button>


        </div>
        <br>
    <?php endforeach; ?>
</div>
<button><a href="liaisons/create">Create liaison</a></button>