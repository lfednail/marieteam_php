<!-- Table tarif -->
<div class="p-4 space-y-8">
    <div style="position: sticky;">
        <label for="Tarif" class="block text-lg font-semibold text-gray-700 mb-2">Tarif</label>
        <table id="Tarif" class=" w-1/3 border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <tr class="bg-blue-700 text-white  ">
                <th class="py-2 px-4">Categorie</th>
                <th class="py-2 px-4">type</th>
                <th></th>
                <th class="py-2 px-4">Periode</th>
                <th></th>
            </tr>
            <tr class="bg-gray-50 even:bg-gray-100 py-2 px-4 text-center">
                <td></td>
                <td></td>
                <?php foreach($periodes as $p): ?>
                    <td><?= $p['Debut_periode'] . ' <br> to <br> ' . $p['Fin_periode'] ?></td>
                <?php endforeach;?>
            </tr>
            <?php foreach($tarif as $t):

                ?>
                <tr class="py-2 px-4 text-center">
                    <td><?= $t['Libelle_categorie_tarif'] ?></td>
                    <td><?= $t ['Libelle_typeTarif'] ?></td>
                    <?php foreach($periodes as $p): ?>
                        <td><?= (new DateTime($t['Debut_periode']) == new DateTime($p['Debut_periode']) )? $t['Tarif']  . '€': 'undefined' ; ?> </td>
                    <?php endforeach;?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- table crossing voyageur-->
    <?php if(!empty($crossingVoyageur)): ?>
        <div class="w-2/3 mx-1/3">
            <label for="Crossing" class="block text-lg font-semibold text-gray-700 mb-2">Crossing voyageur</label>
            <table id="Crossing" class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                <tr class="bg-blue-700 text-white py-2 px-4 text-center">
                    <!--<th>Date</th>-->
                    <th class="py-2 px-4">Boarding date</th>
                    <th class="py-2 px-4">Arrival date</th>
                    <th class="py-2 px-4">Boarding quay</th>
                    <th class="py-2 px-4">Destination</th>
                    <th class="py-2 px-4">Travel length</th>
                    <th class="py-2 px-4">Boat name</th>
                    <th class="py-2 px-4">Places passager</th>
                    <th class="py-2 px-4">Places vehicule inf 5</th>
                    <th class="py-2 px-4">Places vehicule sup 5</th>
                </tr>
                <?php foreach ($crossingVoyageur as $cv): ?>

                <tr class=" py-2 px-4 text-center">
                    <td><?= $cv['Date_depart'] ?></td>
                    <td><?= $cv['Date_arrive'] ?></td>
                    <td><?= $cv['Lieu_depart'] ?></td>
                    <td><?= $cv['Lieu_arrivee'] ?></td>
                    <td><?= $cv['Distance_liaison'] ?></td>
                    <td><?= $cv['Nom_bateau'] ?></td>
                    <td><?= $cv['Places_passager'] ?></td>
                    <td><?=  $cv['Places_vehicule_inf_5'] ?></td>
                    <td><?= $cv['Places_vehicule_sup_5'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <!-- table crossing fret-->
    <?php if(!empty($crossingFret)): ?>
        <div class="w-2/3 mx-1/3">
            <label for="Crossing" class="block text-lg font-semibold text-gray-700 mb-2">Crossing fret</label>
            <table id="Crossing" class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                <tr class="bg-blue-700 text-white py-2 px-4 text-center">
                    <!--<th>Date</th>-->
                    <th class="py-2 px-4">Boarding date</th>
                    <th class="py-2 px-4">Arrival date</th>
                    <th class="py-2 px-4">Boarding quay</th>
                    <th class="py-2 px-4">Destination</th>
                    <th class="py-2 px-4">Travel length</th>
                    <th class="py-2 px-4">Boat name</th>
                    <th class="py-2 px-4">Max weight</th>
                </tr>
                <?php foreach ($crossingFret as $cf): ?>

                    <tr class=" py-2 px-4 text-center">
                        <td><?= $cf['Date_depart'] ?></td>
                        <td><?= $cf['Date_arrive'] ?></td>
                        <td><?= $cf['Lieu_depart'] ?></td>
                        <td><?= $cf['Lieu_arrivee'] ?></td>
                        <td><?= $cf['Distance_liaison'] ?></td>
                        <td><?= $cf['Nom_bateau'] ?></td>
                        <td><?= $cf['Poid_max'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>