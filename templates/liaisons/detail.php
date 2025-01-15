<?php

$listLiaisonTarif = $db->select("Select * from viewtarif_liaison where id_Liaison = ${data['id']} order by Libelle_categorie_tarif  ");


$listTraverseeLiaison = $db->select("Select vt.* from viewtraversee as vt, traversee as t where t.id_Liaison = ${data['id']} and t.id_Traversee = vt.id_Traversee");

$periodes = $db->select("Select * from periode");

//donnees pour la liste des traversee
$bateauFret = [];
$bateauVoyageur = [];

?>


<!-- Table tarif -->
<label for="Tarif">Tarif</label>
<table id="Tarif">
    <tr>
        <th>Categorie</th>
        <th>type</th>
        <th></th>
        <th>Periode</th>
        <th></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <?php foreach($periodes as $p): ?>
            <td><?= $p['Debut_periode'] . '<br>to<br>' . $p['Fin_periode'] ?></td>
        <?php endforeach;?>
    </tr>
    <?php foreach($listLiaisonTarif as $lt):

        ?>
        <tr>
            <td><?= $lt['Libelle_categorie_tarif'] ?></td>
            <td><?= $lt ['Libelle_typeTarif'] ?></td>
            <?php foreach($periodes as $p): ?>
                <td><?= (new DateTime($lt['Debut_periode']) == new DateTime($p['Debut_periode']) )? $lt['Tarif']  . '€': 'undefined' ; ?> </td>
            <?php endforeach;?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- table traversee -->
<label for="Traversee">Traversee</label>
<table id="Traversee">
    <tr>
        <!--<th>Date</th>-->
        <th>Boarding date</th>
        <th>Arrival date</th>
        <th>Number of places</th>
        <th>Boarding quay</th>
        <th>Destination</th>
        <th>Travel length</th>
        <th>Boat name</th>
        <th>Type boat</th>
    </tr>
    <?php foreach ($listTraverseeLiaison as $traversee): ?>
    <tr>
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