<?php

    use App\DB\BDD;

    $db = new BDD();

    $traversee = $db->select('Select * from viewtraversee');
?>
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
    <?php foreach ($traversee as $t): ?>
        <tr>
            <td><?= $t['Date_depart'] ?></td>
            <td><?= $t['Date_arrive'] ?></td>
            <td><?= $t['Nombre_place'] ?></td>
            <td><?= $t['Lieu_depart'] ?></td>
            <td><?= $t['Lieu_arrivee'] ?></td>
            <td><?= $t['Distance_liaison'] ?></td>
            <td><?= $t['Nom_bateau'] ?></td>
            <td><?= $t['Type_bateau'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>