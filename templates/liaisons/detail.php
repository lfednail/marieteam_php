<?php

$listLiaisonTarif = $db->select("Select * from viewtarif_liaison where id_Liaison = ${data['id']} order by Libelle_categorie_tarif  ");
$listTraverseeLiaison = $db->select("Select vt.* from viewtraversee as vt, traversee as t where t.id_Liaison = ${data['id']} and t.id_Traversee = vt.id_Traversee");
$periodes = $db->select("Select * from periode");

//donnees pour la liste des traversee
$bateauFret = [];
$bateauVoyageur = [];

?>


<!-- Table tarif -->
<!--
small floaty tab
upper right corner
-->
<div class="p-4 space-y-8">
    <div>
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
            <?php foreach($listLiaisonTarif as $lt):

                ?>
                <tr class="py-2 px-4 text-center">
                    <td><?= $lt['Libelle_categorie_tarif'] ?></td>
                    <td><?= $lt ['Libelle_typeTarif'] ?></td>
                    <?php foreach($periodes as $p): ?>
                        <td><?= (new DateTime($lt['Debut_periode']) == new DateTime($p['Debut_periode']) )? $lt['Tarif']  . '€': 'undefined' ; ?> </td>
                    <?php endforeach;?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- table crossing-->
    <!--
    main tab
    screen width - width tarif tab
    -->
    <div class="w-2/3 mx-1/3">
        <label for="Crossing" class="block text-lg font-semibold text-gray-700 mb-2">Crossing</label>
        <table id="Crossing" class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <tr class="bg-blue-700 text-white py-2 px-4 text-center">
                <!--<th>Date</th>-->
                <th class="py-2 px-4">Boarding date</th>
                <th class="py-2 px-4">Arrival date</th>
                <th class="py-2 px-4">Number of places</th>
                <th class="py-2 px-4">Boarding quay</th>
                <th class="py-2 px-4">Destination</th>
                <th class="py-2 px-4">Travel length</th>
                <th class="py-2 px-4">Boat name</th>
                <th class="py-2 px-4">Type boat</th>
            </tr>
            <?php foreach ($listTraverseeLiaison as $traversee): ?>

            <tr class=" py-2 px-4 text-center">
                <td><?= $traversee['Date_depart'] ?></td>
                <td><?= $traversee['Date_arrive'] ?></td>
                <td><?= $traversee['Nombre_place'] ?></td>
                <td><?= $traversee['Lieu_depart'] ?></td>
                <td><?= $traversee['Lieu_arrivee'] ?></td>
                <td><?= $traversee['Distance_liaison'] ?></td>
                <td><?= $traversee['Nom_bateau'] ?></td>
                <td><?= $traversee['Type_bateau'] ?></td>
            </tr>

            <?php endforeach; ?>
        </table>
    </div>
</div>
